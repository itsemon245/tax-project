<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\ExpertCategory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            BannerSeeder::class,
            SettingSeeder::class,
            ProductCategorySeeder::class,
            ProductSeeder::class,
            AppointmentSeeder::class,
            InfoSeeder::class,
            SocialHandleSeeder::class,
            PermissionSeeder::class,
            RoleSeeder::class,
            ClientSeeder::class,
            ClientStudioSeeder::class,
            ServiceCategorySeeder::class,
            ServiceSubCategorySeeder::class,
            ServiceSeeder::class,
            InvoiceSeeder::class,
            InvoiceItemSeeder::class,
            MapSeeder::class,
            CaseStudyPackageSeeder::class,
            CaseStudyCategorySeeder::class,
            CaseStudySeeder::class,
            ExpertCategorySeeder::class,
            ExpertProfileSeeder::class,
            CourseSeeder::class,
            ExamSeeder::class,
            CalendarSeeder::class,
            PromoCodeSeeder::class,
            BookCategorySeeder::class,
            BookSeeder::class,
            IndustrySeeder::class,
            AboutSeeder::class,
            ExpenseSeeder::class,
            AchievementSeeder::class,
        ]);
    }
}
