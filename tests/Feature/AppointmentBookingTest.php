<?php

namespace Tests\Feature;

use App\Models\AppointmentTime;
use App\Models\ExpertProfile;
use App\Models\User;
use App\Http\Controllers\Frontend\Page\PageController;
use Illuminate\Contracts\Console\Kernel;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Role;
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
        Schema::create('model_has_roles', function ($table) {
            $table->unsignedBigInteger('role_id');
            $table->string('model_type');
            $table->unsignedBigInteger('model_id');
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
}
