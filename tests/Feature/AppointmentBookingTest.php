<?php

namespace Tests\Feature;

use App\Models\AppointmentTime;
use App\Models\ExpertProfile;
use App\Models\Map;
use App\Models\User;
use App\Models\UserAppointment;
use App\Http\Controllers\Backend\UserAppointmentController;
use App\Http\Controllers\Frontend\Page\PageController;
use Illuminate\Contracts\Console\Kernel;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Tests\TestCase;

class AppointmentBookingTest extends TestCase {
    public function createApplication(): Application {
        $app = require __DIR__.'/../../bootstrap/app.php';

        $app->make(Kernel::class)->bootstrap();
        $app['config']->set('database.default', 'sqlite');
        $app['config']->set('database.connections.sqlite.database', ':memory:');

        return $app;
    }

    protected function setUp(): void {
        parent::setUp();

        Schema::create('users', function ($table) {
            $table->id();
            $table->string('name');
            $table->string('user_name');
            $table->string('image_url')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->string('refer_link')->nullable();
            $table->timestamps();
        });
        Schema::create('roles', function ($table) {
            $table->id();
            $table->string('name');
            $table->string('guard_name');
            $table->timestamps();
        });
        Schema::create('permissions', function ($table) {
            $table->id();
            $table->string('name');
            $table->string('guard_name');
            $table->timestamps();
        });
        Schema::create('model_has_roles', function ($table) {
            $table->unsignedBigInteger('role_id');
            $table->string('model_type');
            $table->unsignedBigInteger('model_id');
        });
        Schema::create('model_has_permissions', function ($table) {
            $table->unsignedBigInteger('permission_id');
            $table->string('model_type');
            $table->unsignedBigInteger('model_id');
        });
        Schema::create('role_has_permissions', function ($table) {
            $table->unsignedBigInteger('permission_id');
            $table->unsignedBigInteger('role_id');
        });
        Schema::create('appointment_times', function ($table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('day');
            $table->json('times');
            $table->timestamps();
        });
        Schema::create('expert_profiles', function ($table) {
            $table->id();
            $table->string('name');
            $table->string('post');
            $table->unsignedBigInteger('map_id')->nullable();
            $table->text('bio')->nullable();
            $table->text('image')->nullable();
            $table->integer('experience');
            $table->date('join_date');
            $table->string('availability');
            $table->text('at_a_glance')->nullable();
            $table->text('description');
            $table->string('district')->nullable();
            $table->string('thana')->nullable();
            $table->integer('discount')->nullable();
            $table->string('billing_type')->default('onetime');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->timestamps();
        });
        Schema::create('maps', function ($table) {
            $table->id();
            $table->string('district');
            $table->string('thana');
            $table->string('location');
            $table->text('address');
            $table->text('src');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
        Schema::create('banners', function ($table) {
            $table->id();
            $table->timestamps();
        });
        Schema::create('infos', function ($table) {
            $table->id();
            $table->unsignedBigInteger('section_id');
            $table->timestamps();
        });
        Schema::create('reviews', function ($table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->timestamps();
        });
        Schema::create('user_appointments', function ($table) {
            $table->id();
            $table->unsignedBigInteger('map_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('expert_profile_id')->nullable();
            $table->text('name');
            $table->text('email');
            $table->text('phone');
            $table->text('district');
            $table->text('thana');
            $table->date('date');
            $table->text('time');
            $table->boolean('is_physical')->default(false);
            $table->boolean('is_completed')->default(false);
            $table->boolean('is_approved')->default(false);
            $table->date('completed_at')->nullable();
            $table->date('approved_at')->nullable();
            $table->timestamps();
        });
        Schema::create('calendars', function ($table) {
            $table->id();
            $table->unsignedBigInteger('user_appointment_id')->nullable();
            $table->string('service')->nullable();
            $table->string('type')->nullable();
            $table->string('title');
            $table->dateTime('start');
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    protected function tearDown(): void {
        Carbon::setTestNow();

        parent::tearDown();
    }

    public function test_consultation_uses_admin_time_windows_when_the_expert_has_no_user(): void {
        Carbon::setTestNow(Carbon::parse('2026-09-12 10:00:00', 'Asia/Dhaka'));

        $admin = User::factory()->create();
        Role::findOrCreate('super admin');
        $admin->assignRole('super admin');
        AppointmentTime::create([
            'user_id' => $admin->id,
            'day' => 'Wednesday',
            'times' => ['02:51'],
        ]);
        $expert = ExpertProfile::factory()->create(['user_id' => null]);

        $view = app(PageController::class)->appointmentPage(Request::create('/make-consultation/'.$expert->id), $expert);

        $this->assertContains('02:51', $view->getData()['dates']['Wednesday, September 09, 2026']);
    }

    public function test_consultation_falls_back_to_admin_availability_and_uses_the_profiles_assigned_branch(): void {
        Carbon::setTestNow(Carbon::parse('2026-09-12 10:00:00', 'Asia/Dhaka'));

        $admin = User::factory()->create();
        Role::findOrCreate('super admin');
        $admin->assignRole('super admin');
        AppointmentTime::create([
            'user_id' => $admin->id,
            'day' => 'Wednesday',
            'times' => ['02:51'],
        ]);
        $expertUser = User::factory()->create();
        $branch = Map::create([
            'district' => 'Chattogram',
            'thana' => 'Karnaphuli',
            'location' => 'Agrabad',
            'address' => 'Test address',
            'src' => 'https://example.test/map',
            'user_id' => null,
        ]);
        $expert = ExpertProfile::factory()->create([
            'user_id' => $expertUser->id,
            'map_id' => $branch->id,
        ]);

        $physicalView = app(PageController::class)->appointmentPage(Request::create('/make-consultation/'.$expert->id), $expert);
        $virtualView = app(PageController::class)->appointmentVirtual(Request::create('/make-consultation/virtual/'.$expert->id), $expert);

        $this->assertContains('02:51', $physicalView->getData()['dates']['Wednesday, September 09, 2026']);
        $this->assertContains('02:51', $virtualView->getData()['dates']['Wednesday, September 09, 2026']);
        $this->assertSame(['Chattogram'], $physicalView->getData()['branchDistricts']->all());
        $this->assertSame([$branch->id], collect($physicalView->getData()['maps'])->pluck('id')->all());
    }

    public function test_booking_pages_provide_local_district_and_thana_options(): void {
        $admin = User::factory()->create();
        Role::findOrCreate('super admin');
        $admin->assignRole('super admin');

        $physicalView = app(PageController::class)->appointmentPage(Request::create('/make-appointment'));
        $virtualView = app(PageController::class)->appointmentVirtual(Request::create('/make-appointment/virtual'));

        foreach ([$physicalView, $virtualView] as $view) {
            $this->assertArrayHasKey('locations', $view->getData());
            $this->assertContains('Chattogram', collect($view->getData()['locations'])->pluck('district')->all());
        }
    }

    public function test_physical_appointment_requires_a_location(): void {
        $this->from(route('appointment.make'))
            ->post(route('user-appointment.store'), [
                'is_physical' => '1',
                'name' => 'Test Client',
                'email' => 'client@example.test',
                'phone' => '01234567890',
                'district' => 'Chattogram',
                'thana' => 'Agrabad',
                'date' => '2026-09-12',
                'time' => '10:00',
            ])
            ->assertRedirect(route('appointment.make'))
            ->assertSessionHasErrors(['location']);
    }

    public function test_appointment_requires_each_booking_and_contact_field(): void {
        $this->from(route('appointment.virtual'))
            ->post(route('user-appointment.store'), ['is_physical' => '0'])
            ->assertRedirect(route('appointment.virtual'))
            ->assertSessionHasErrors([
                'date',
                'time',
                'name',
                'email',
                'phone',
                'district',
                'thana',
            ]);
    }

    public function test_a_user_without_consultation_approval_permission_cannot_approve_a_consultation(): void {
        $appointment = $this->consultation();
        $user = User::factory()->create();

        $this->actAsConsultationUser($user);

        $this->expectException(HttpException::class);

        app(UserAppointmentController::class)->approve($appointment->id);
    }

    public function test_an_expert_with_consultation_approval_permission_can_approve_their_consultation(): void {
        $expertUser = User::factory()->create();
        $expert = ExpertProfile::factory()->create(['user_id' => $expertUser->id]);
        $permission = Permission::findOrCreate('approve consultation');
        $role = Role::findOrCreate('expert');
        $role->givePermissionTo($permission);
        $expertUser->assignRole($role);
        $appointment = $this->consultation($expert);

        $this->actAsConsultationUser($expertUser);

        app(UserAppointmentController::class)->approve($appointment->id);

        $this->assertTrue((bool) $appointment->fresh()->is_approved);
    }

    private function consultation(?ExpertProfile $expert = null): UserAppointment {
        $expert ??= ExpertProfile::factory()->create();

        return UserAppointment::create([
            'expert_profile_id' => $expert->id,
            'name' => 'Test Client',
            'email' => 'client@example.test',
            'phone' => '01234567890',
            'district' => 'Chattogram',
            'thana' => 'Karnaphuli',
            'date' => '2026-09-12',
            'time' => '10:00',
        ]);
    }

    private function actAsConsultationUser(User $user): void {
        $request = Request::create('/admin/user-appointments', 'PATCH', ['type' => 'consultation']);
        $request->setLaravelSession(app('session.store'));
        app()->instance('request', $request);

        $this->actingAs($user);
    }
}
