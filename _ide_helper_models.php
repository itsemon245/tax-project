<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Section> $sections
 * @property-read int|null $sections_count
 * @method static \Database\Factories\AboutFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|About newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|About newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|About query()
 * @method static \Illuminate\Database\Eloquent\Builder|About whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|About whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|About whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|About whereUpdatedAt($value)
 */
	class About extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string|null $image
 * @property int|null $count
 * @property string|null $title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\AchievementFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Achievement newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Achievement newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Achievement query()
 * @method static \Illuminate\Database\Eloquent\Builder|Achievement whereCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Achievement whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Achievement whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Achievement whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Achievement whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Achievement whereUpdatedAt($value)
 */
	class Achievement extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $title
 * @property string $sub_title
 * @property string $tag
 * @property string $description
 * @property string $image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\AppointmentFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Appointment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Appointment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Appointment query()
 * @method static \Illuminate\Database\Eloquent\Builder|Appointment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Appointment whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Appointment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Appointment whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Appointment whereSubTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Appointment whereTag($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Appointment whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Appointment whereUpdatedAt($value)
 */
	class Appointment extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int|null $user_id
 * @property int|null $login_status
 * @property string|null $login_time
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User|null $user
 * @method static \Database\Factories\AuthenticationFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Authentication newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Authentication newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Authentication query()
 * @method static \Illuminate\Database\Eloquent\Builder|Authentication whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Authentication whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Authentication whereLoginStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Authentication whereLoginTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Authentication whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Authentication whereUserId($value)
 */
	class Authentication extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $title
 * @property string $sub_title
 * @property string $button
 * @property string|null $image_name
 * @property string|null $image_url
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\BannerFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Banner newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Banner newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Banner query()
 * @method static \Illuminate\Database\Eloquent\Builder|Banner whereButton($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Banner whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Banner whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Banner whereImageName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Banner whereImageUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Banner whereSubTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Banner whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Banner whereUpdatedAt($value)
 */
	class Banner extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $book_category_id
 * @property string|null $title
 * @property string|null $author
 * @property string $description
 * @property string|null $sample_pdf
 * @property string|null $pdf
 * @property string|null $thumbnail
 * @property-read string|null $price
 * @property int $is_discount_fixed true = Discount is fixed, false = Discount is percentage
 * @property int|null $discount
 * @property string $billing_type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\BookCategory $bookCategory
 * @property-read \App\Models\Purchase|null $purchase
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Review> $reviews
 * @property-read int|null $reviews_count
 * @method static \Database\Factories\BookFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Book newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Book newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Book query()
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereAuthor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereBillingType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereBookCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereDiscount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereIsDiscountFixed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book wherePdf($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereSamplePdf($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereThumbnail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereUpdatedAt($value)
 */
	class Book extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Book> $books
 * @property-read int|null $books_count
 * @method static \Database\Factories\BookCategoryFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|BookCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BookCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BookCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|BookCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BookCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BookCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BookCategory whereUpdatedAt($value)
 */
	class BookCategory extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int|null $client_id
 * @property int|null $invoice_id
 * @property int|null $user_appointment_id
 * @property string|null $service
 * @property string|null $type
 * @property string $title
 * @property string $start
 * @property string|null $description
 * @property int $is_completed
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Client|null $client
 * @method static \Database\Factories\CalendarFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Calendar newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Calendar newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Calendar query()
 * @method static \Illuminate\Database\Eloquent\Builder|Calendar whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Calendar whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Calendar whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Calendar whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Calendar whereInvoiceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Calendar whereIsCompleted($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Calendar whereService($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Calendar whereStart($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Calendar whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Calendar whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Calendar whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Calendar whereUserAppointmentId($value)
 */
	class Calendar extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $case_study_category_id
 * @property int $case_study_package_id
 * @property string $name
 * @property string $intro
 * @property string $image
 * @property string $description
 * @property int $likes
 * @property int $downloads
 * @property-read string $price
 * @property string $download_link
 * @property int $is_discount_fixed true = Discount is fixed, false = Discount is percentage
 * @property int|null $discount
 * @property string $billing_type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\CaseStudyCategory $caseStudyCategory
 * @property-read \App\Models\CaseStudyPackage $caseStudyPackage
 * @property-read \App\Models\Purchase|null $purchase
 * @method static \Database\Factories\CaseStudyFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|CaseStudy newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CaseStudy newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CaseStudy query()
 * @method static \Illuminate\Database\Eloquent\Builder|CaseStudy whereBillingType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CaseStudy whereCaseStudyCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CaseStudy whereCaseStudyPackageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CaseStudy whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CaseStudy whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CaseStudy whereDiscount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CaseStudy whereDownloadLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CaseStudy whereDownloads($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CaseStudy whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CaseStudy whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CaseStudy whereIntro($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CaseStudy whereIsDiscountFixed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CaseStudy whereLikes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CaseStudy whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CaseStudy wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CaseStudy whereUpdatedAt($value)
 */
	class CaseStudy extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $case_study_package_id
 * @property string|null $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\CaseStudy> $caseStudies
 * @property-read int|null $case_studies_count
 * @property-read \App\Models\CaseStudyPackage $caseStudyPackage
 * @method static \Database\Factories\CaseStudyCategoryFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|CaseStudyCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CaseStudyCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CaseStudyCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|CaseStudyCategory whereCaseStudyPackageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CaseStudyCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CaseStudyCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CaseStudyCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CaseStudyCategory whereUpdatedAt($value)
 */
	class CaseStudyCategory extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $price
 * @property int|null $limit
 * @property string $billing_type
 * @property string|null $page_title
 * @property string|null $page_description
 * @property string|null $page_image
 * @property int $is_discount_fixed true = Discount is fixed, false = Discount is percentage
 * @property int|null $discount
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\CaseStudy> $caseStudies
 * @property-read int|null $case_studies_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\CaseStudyCategory> $caseStudyCategories
 * @property-read int|null $case_study_categories_count
 * @method static \Database\Factories\CaseStudyPackageFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|CaseStudyPackage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CaseStudyPackage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CaseStudyPackage query()
 * @method static \Illuminate\Database\Eloquent\Builder|CaseStudyPackage whereBillingType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CaseStudyPackage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CaseStudyPackage whereDiscount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CaseStudyPackage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CaseStudyPackage whereIsDiscountFixed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CaseStudyPackage whereLimit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CaseStudyPackage whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CaseStudyPackage wherePageDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CaseStudyPackage wherePageImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CaseStudyPackage wherePageTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CaseStudyPackage wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CaseStudyPackage whereUpdatedAt($value)
 */
	class CaseStudyPackage extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $client_id
 * @property string|null $chalan_no
 * @property \Illuminate\Support\Carbon|null $date
 * @property string|null $code
 * @property string|null $bank_name
 * @property string|null $name
 * @property string|null $location
 * @property string|null $phone
 * @property string|null $purpose
 * @property string|null $description
 * @property string|null $year
 * @property string|null $payment_type
 * @property string|null $cheque_no
 * @property string|null $cheque_expire_date
 * @property string|null $bank
 * @property string|null $branch
 * @property string|null $amount
 * @property string|null $amount_in_words
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Client $client
 * @method static \Database\Factories\ChalanFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Chalan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Chalan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Chalan query()
 * @method static \Illuminate\Database\Eloquent\Builder|Chalan whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chalan whereAmountInWords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chalan whereBank($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chalan whereBankName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chalan whereBranch($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chalan whereChalanNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chalan whereChequeExpireDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chalan whereChequeNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chalan whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chalan whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chalan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chalan whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chalan whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chalan whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chalan whereLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chalan whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chalan wherePaymentType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chalan wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chalan wherePurpose($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chalan whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chalan whereYear($value)
 */
	class Chalan extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $tin
 * @property string $nid
 * @property string $circle
 * @property string $zone
 * @property string $dob
 * @property string|null $phone
 * @property string|null $email
 * @property string $taxpayer_status
 * @property string|null $special_benefits
 * @property string $father_name
 * @property string $mother_name
 * @property string $company_name
 * @property string|null $spouse_name
 * @property string|null $spouse_tin
 * @property string $present_address
 * @property string $permanent_address
 * @property string $nature_of_business
 * @property string $ref_no
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Calendar> $calendars
 * @property-read int|null $calendars_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Invoice> $invoices
 * @property-read int|null $invoices_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Project> $projects
 * @property-read int|null $projects_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $users
 * @property-read int|null $users_count
 * @method static \Database\Factories\ClientFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Client newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Client newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Client query()
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereCircle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereCompanyName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereDob($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereFatherName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereMotherName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereNatureOfBusiness($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereNid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client wherePermanentAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client wherePresentAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereRefNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereSpecialBenefits($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereSpouseName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereSpouseTin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereTaxpayerStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereTin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereZone($value)
 */
	class Client extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $description
 * @property string $image
 * @property string $title
 * @property int $count
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\ClientStudioFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|ClientStudio newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ClientStudio newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ClientStudio query()
 * @method static \Illuminate\Database\Eloquent\Builder|ClientStudio whereCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClientStudio whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClientStudio whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClientStudio whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClientStudio whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClientStudio whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClientStudio whereUpdatedAt($value)
 */
	class ClientStudio extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $page_title
 * @property string $description
 * @property string $page_banner
 * @property-read string $price
 * @property string $preview
 * @property mixed $page_cards [{title: title, description:description}]
 * @property mixed|null $page_learn_more {description:string, images: array[]}
 * @property string|null $includes
 * @property string|null $graduates_receive
 * @property mixed|null $page_topics description:string, lists: array[]}
 * @property int $is_discount_fixed true = Discount is fixed, false = Discount is percentage
 * @property int|null $discount
 * @property string $billing_type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Exam|null $exam
 * @property-read \App\Models\Purchase|null $purchase
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Review> $reviews
 * @property-read int|null $reviews_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Video> $videos
 * @property-read int|null $videos_count
 * @method static \Database\Factories\CourseFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Course newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Course newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Course query()
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereBillingType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereDiscount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereGraduatesReceive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereIncludes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereIsDiscountFixed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course wherePageBanner($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course wherePageCards($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course wherePageLearnMore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course wherePageTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course wherePageTopics($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course wherePreview($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereUpdatedAt($value)
 */
	class Course extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $page_name
 * @property string $title
 * @property string $description
 * @property string $link
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Image|null $image
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Image> $images
 * @property-read int|null $images_count
 * @method static \Database\Factories\CustomServiceFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|CustomService newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CustomService newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CustomService query()
 * @method static \Illuminate\Database\Eloquent\Builder|CustomService whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomService whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomService whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomService whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomService wherePageName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomService whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomService whereUpdatedAt($value)
 */
	class CustomService extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $course_id
 * @property string $name
 * @property int $total_marks
 * @property int $passing_marks
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Course $course
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Question> $questions
 * @property-read int|null $questions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Result> $results
 * @property-read int|null $results_count
 * @method static \Database\Factories\ExamFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Exam newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Exam newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Exam query()
 * @method static \Illuminate\Database\Eloquent\Builder|Exam whereCourseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Exam whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Exam whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Exam whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Exam wherePassingMarks($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Exam whereTotalMarks($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Exam whereUpdatedAt($value)
 */
	class Exam extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $date
 * @property string|null $merchant
 * @property string|null $category
 * @property mixed|null $items description, amount
 * @property string $type
 * @property string|null $amount
 * @property float|null $balance
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Image|null $image
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Image> $images
 * @property-read int|null $images_count
 * @method static \Database\Factories\ExpenseFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Expense newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Expense newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Expense query()
 * @method static \Illuminate\Database\Eloquent\Builder|Expense whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Expense whereBalance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Expense whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Expense whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Expense whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Expense whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Expense whereItems($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Expense whereMerchant($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Expense whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Expense whereUpdatedAt($value)
 */
	class Expense extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ExpertProfile> $expertProfiles
 * @property-read int|null $expert_profiles_count
 * @method static \Database\Factories\ExpertCategoryFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|ExpertCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ExpertCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ExpertCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|ExpertCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExpertCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExpertCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExpertCategory whereUpdatedAt($value)
 */
	class ExpertCategory extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $post
 * @property int|null $map_id
 * @property string|null $bio
 * @property string|null $image
 * @property int $experience
 * @property string $join_date
 * @property string $availability
 * @property string|null $at_a_glance
 * @property string $description
 * @property string|null $district
 * @property string|null $thana
 * @property int|null $discount
 * @property string $billing_type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ExpertCategory> $expertCategories
 * @property-read int|null $expert_categories_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Review> $reviews
 * @property-read int|null $reviews_count
 * @method static \Database\Factories\ExpertProfileFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|ExpertProfile newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ExpertProfile newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ExpertProfile query()
 * @method static \Illuminate\Database\Eloquent\Builder|ExpertProfile whereAtAGlance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExpertProfile whereAvailability($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExpertProfile whereBillingType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExpertProfile whereBio($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExpertProfile whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExpertProfile whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExpertProfile whereDiscount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExpertProfile whereDistrict($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExpertProfile whereExperience($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExpertProfile whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExpertProfile whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExpertProfile whereJoinDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExpertProfile whereMapId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExpertProfile whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExpertProfile wherePost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExpertProfile whereThana($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExpertProfile whereUpdatedAt($value)
 */
	class ExpertProfile extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $year
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Invoice> $invoices
 * @property-read int|null $invoices_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\UserDoc> $userDocs
 * @property-read int|null $user_docs_count
 * @method static \Illuminate\Database\Eloquent\Builder|FiscalYear newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FiscalYear newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FiscalYear query()
 * @method static \Illuminate\Database\Eloquent\Builder|FiscalYear whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FiscalYear whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FiscalYear whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FiscalYear whereYear($value)
 */
	class FiscalYear extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $imageable_type
 * @property int $imageable_id
 * @property string|null $path
 * @property string $url
 * @property string|null $mime_type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $imageable
 * @method static \Illuminate\Database\Eloquent\Builder|Image newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Image newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Image query()
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereImageableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereImageableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereMimeType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereUrl($value)
 */
	class Image extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Purchase> $purchases
 * @property-read int|null $purchases_count
 * @method static \Database\Factories\IncomeSourceFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|IncomeSource newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|IncomeSource newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|IncomeSource query()
 * @method static \Illuminate\Database\Eloquent\Builder|IncomeSource whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IncomeSource whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IncomeSource whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IncomeSource whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IncomeSource whereUpdatedAt($value)
 */
	class IncomeSource extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string|null $page_description
 * @property string|null $title
 * @property string|null $image
 * @property string|null $intro
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Section> $sections
 * @property-read int|null $sections_count
 * @method static \Database\Factories\IndustryFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Industry newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Industry newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Industry query()
 * @method static \Illuminate\Database\Eloquent\Builder|Industry whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Industry whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Industry whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Industry whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Industry whereIntro($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Industry wherePageDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Industry whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Industry whereUpdatedAt($value)
 */
	class Industry extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $section_id 1 = Section1 and 2 = Section2
 * @property string $page_name
 * @property string $title
 * @property string|null $image_name
 * @property string $image_url
 * @property string $description
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\InfoFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Info newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Info newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Info query()
 * @method static \Illuminate\Database\Eloquent\Builder|Info whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Info whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Info whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Info whereImageName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Info whereImageUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Info wherePageName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Info whereSectionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Info whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Info whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Info whereUpdatedAt($value)
 */
	class Info extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int|null $user_id
 * @property int|null $client_id
 * @property string|null $header_image
 * @property string|null $reference_no
 * @property string|null $note
 * @property string|null $payment_note
 * @property string|null $payment_method
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Client|null $client
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\FiscalYear> $currentFiscal
 * @property-read int|null $current_fiscal_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\FiscalYear> $fiscalYears
 * @property-read int|null $fiscal_years_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\InvoiceItem> $invoiceItems
 * @property-read int|null $invoice_items_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\FiscalYear> $recentFiscalYears
 * @property-read int|null $recent_fiscal_years_count
 * @method static \Database\Factories\InvoiceFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice query()
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereHeaderImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice wherePaymentMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice wherePaymentNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereReferenceNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereUserId($value)
 */
	class Invoice extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $invoice_id
 * @property string $name
 * @property string|null $description
 * @property int $rate
 * @property int $qty
 * @property int $total
 * @property string $taxes a json object that includes tax rate, tax name, tax number
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Invoice $invoice
 * @method static \Database\Factories\InvoiceItemFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|InvoiceItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|InvoiceItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|InvoiceItem query()
 * @method static \Illuminate\Database\Eloquent\Builder|InvoiceItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InvoiceItem whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InvoiceItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InvoiceItem whereInvoiceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InvoiceItem whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InvoiceItem whereQty($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InvoiceItem whereRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InvoiceItem whereTaxes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InvoiceItem whereTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InvoiceItem whereUpdatedAt($value)
 */
	class InvoiceItem extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Maintenance newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Maintenance newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Maintenance query()
 */
	class Maintenance extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $district
 * @property string $thana
 * @property string $location
 * @property string $address
 * @property string $src
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Database\Factories\MapFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Map newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Map newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Map onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Map query()
 * @method static \Illuminate\Database\Eloquent\Builder|Map whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Map whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Map whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Map whereDistrict($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Map whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Map whereLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Map whereSrc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Map whereThana($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Map whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Map withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Map withoutTrashed()
 */
	class Map extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\MyDocumentFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|MyDocument newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MyDocument newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MyDocument query()
 * @method static \Illuminate\Database\Eloquent\Builder|MyDocument whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MyDocument whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MyDocument whereUpdatedAt($value)
 */
	class MyDocument extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $message
 * @property string|null $user_type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Notifcation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Notifcation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Notifcation query()
 * @method static \Illuminate\Database\Eloquent\Builder|Notifcation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notifcation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notifcation whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notifcation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notifcation whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notifcation whereUserType($value)
 */
	class Notifcation extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $name
 * @property string|null $phone
 * @property string|null $division
 * @property string|null $district
 * @property string|null $thana
 * @property string|null $address
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|PartnerRequest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PartnerRequest newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PartnerRequest query()
 * @method static \Illuminate\Database\Eloquent\Builder|PartnerRequest whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PartnerRequest whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PartnerRequest whereDistrict($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PartnerRequest whereDivision($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PartnerRequest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PartnerRequest whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PartnerRequest wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PartnerRequest whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PartnerRequest whereThana($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PartnerRequest whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PartnerRequest whereUserId($value)
 */
	class PartnerRequest extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string|null $designation
 * @property string|null $email
 * @property string|null $phone
 * @property string|null $facebook
 * @property string|null $twitter
 * @property string|null $linkedin
 * @property string|null $image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\PartnerSectionFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|PartnerSection newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PartnerSection newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PartnerSection query()
 * @method static \Illuminate\Database\Eloquent\Builder|PartnerSection whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PartnerSection whereDesignation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PartnerSection whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PartnerSection whereFacebook($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PartnerSection whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PartnerSection whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PartnerSection whereLinkedin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PartnerSection whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PartnerSection wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PartnerSection whereTwitter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PartnerSection whereUpdatedAt($value)
 */
	class PartnerSection extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $product_category_id
 * @property int $product_sub_category_id
 * @property int $user_id
 * @property string $title
 * @property string|null $sub_title
 * @property-read int|null $price
 * @property int|null $discount
 * @property string $package_features user custom package features including text colors
 * @property string|null $description
 * @property int $is_discount_fixed true = Discount is fixed, false = Discount is percentage
 * @property string $billing_type
 * @property int $is_most_popular true = This Product is most popular, false = This Product is not most popular
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\ProductCategory $productCategory
 * @property-read \App\Models\Purchase|null $purchase
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Review> $reviews
 * @property-read int|null $reviews_count
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\ProductFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereBillingType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereDiscount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereIsDiscountFixed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereIsMostPopular($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product wherePackageFeatures($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereProductCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereProductSubCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereSubTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereUserId($value)
 */
	class Product extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ProductSubCategory> $productSubCategories
 * @property-read int|null $product_sub_categories_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Product> $products
 * @property-read int|null $products_count
 * @method static \Database\Factories\ProductCategoryFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory withoutTrashed()
 */
	class ProductCategory extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $product_category_id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\ProductCategory $productCategory
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Product> $products
 * @property-read int|null $products_count
 * @method static \Database\Factories\ProductSubCategoryFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|ProductSubCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductSubCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductSubCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductSubCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductSubCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductSubCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductSubCategory whereProductCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductSubCategory whereUpdatedAt($value)
 */
	class ProductSubCategory extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $start_date
 * @property string $end_date
 * @property int $weekdays
 * @property int $total_clients
 * @property int $daily_target
 * @property int|null $weekly_target
 * @property int|null $monthly_target
 * @property int $total_progress
 * @property int $daily_progress
 * @property int $weekly_progress
 * @property int $monthly_progress
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Client> $clients
 * @property-read int|null $clients_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Task> $tasks
 * @property-read int|null $tasks_count
 * @method static \Database\Factories\ProjectFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Project newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Project newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Project query()
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereDailyProgress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereDailyTarget($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereMonthlyProgress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereMonthlyTarget($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereTotalClients($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereTotalProgress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereWeekdays($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereWeeklyProgress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereWeeklyTarget($value)
 */
	class Project extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property int $phone
 * @property string $location
 * @property string $message
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\ProjectDiscussionFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectDiscussion newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectDiscussion newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectDiscussion query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectDiscussion whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectDiscussion whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectDiscussion whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectDiscussion whereLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectDiscussion whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectDiscussion whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectDiscussion wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectDiscussion whereUpdatedAt($value)
 */
	class ProjectDiscussion extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $code
 * @property int $status
 * @property int $is_discount
 * @property int $amount
 * @property string $expired_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User|null $user
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $users
 * @property-read int|null $users_count
 * @method static \Database\Factories\PromoCodeFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|PromoCode newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PromoCode newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PromoCode query()
 * @method static \Illuminate\Database\Eloquent\Builder|PromoCode whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PromoCode whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PromoCode whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PromoCode whereExpiredAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PromoCode whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PromoCode whereIsDiscount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PromoCode whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PromoCode whereUpdatedAt($value)
 */
	class PromoCode extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int|null $user_id
 * @property int|null $promo_code_id
 * @property string|null $name
 * @property string|null $contact_number
 * @property string|null $discount
 * @property int $has_promo_code_applied
 * @property string|null $billing_type
 * @property string|null $payment_method
 * @property string|null $payment_number
 * @property string|null $trx_id
 * @property string|null $metadata
 * @property string|null $payable_amount
 * @property string|null $paid
 * @property string|null $due
 * @property string $status
 * @property string|null $due_date
 * @property string|null $payment_date
 * @property string|null $expire_date
 * @property int|null $is_expired
 * @property string $purchasable_type
 * @property int $purchasable_id
 * @property int $approved
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\IncomeSource|null $incomeSource
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $purchasable
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Purchase newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Purchase newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Purchase query()
 * @method static \Illuminate\Database\Eloquent\Builder|Purchase whereApproved($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Purchase whereBillingType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Purchase whereContactNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Purchase whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Purchase whereDiscount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Purchase whereDue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Purchase whereDueDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Purchase whereExpireDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Purchase whereHasPromoCodeApplied($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Purchase whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Purchase whereIsExpired($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Purchase whereMetadata($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Purchase whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Purchase wherePaid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Purchase wherePayableAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Purchase wherePaymentDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Purchase wherePaymentMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Purchase wherePaymentNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Purchase wherePromoCodeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Purchase wherePurchasableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Purchase wherePurchasableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Purchase whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Purchase whereTrxId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Purchase whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Purchase whereUserId($value)
 */
	class Purchase extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $exam_id
 * @property string $name
 * @property int $mark
 * @property mixed $choices
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Exam $exam
 * @method static \Illuminate\Database\Eloquent\Builder|Question newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Question newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Question query()
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereChoices($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereExamId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereMark($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereUpdatedAt($value)
 */
	class Question extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $user_id
 * @property int $parent_id
 * @property int|null $commission
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User|null $parent
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\RefereeFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Referee newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Referee newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Referee query()
 * @method static \Illuminate\Database\Eloquent\Builder|Referee whereCommission($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Referee whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Referee whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Referee whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Referee whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Referee whereUserId($value)
 */
	class Referee extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int|null $user_id
 * @property int|null $exam_id
 * @property int $right
 * @property int $wrong
 * @property int $obtained_marks
 * @property int $has_passed
 * @property string|null $score
 * @property string|null $grade
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Exam|null $exam
 * @property-read \App\Models\User|null $user
 * @method static \Database\Factories\ResultFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Result newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Result newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Result query()
 * @method static \Illuminate\Database\Eloquent\Builder|Result whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Result whereExamId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Result whereGrade($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Result whereHasPassed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Result whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Result whereObtainedMarks($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Result whereRight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Result whereScore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Result whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Result whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Result whereWrong($value)
 */
	class Result extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $client_id
 * @property string $assessment_year
 * @property string $residential_status
 * @property string $assessee_status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\ReturnFormFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|ReturnForm newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ReturnForm newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ReturnForm query()
 * @method static \Illuminate\Database\Eloquent\Builder|ReturnForm whereAssesseeStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReturnForm whereAssessmentYear($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReturnForm whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReturnForm whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReturnForm whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReturnForm whereResidentialStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReturnForm whereUpdatedAt($value)
 */
	class ReturnForm extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $reviewable_type
 * @property int $reviewable_id
 * @property int|null $user_id
 * @property string|null $avatar
 * @property string|null $name
 * @property string $comment
 * @property string $rating
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $reviewable
 * @property-read \App\Models\User|null $user
 * @method static \Database\Factories\ReviewFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Review newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Review newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Review query()
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereReviewableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereReviewableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereUserId($value)
 */
	class Review extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $sectionable_type
 * @property int $sectionable_id
 * @property string|null $title
 * @property string|null $description
 * @property string|null $image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\SectionFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Section newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Section newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Section query()
 * @method static \Illuminate\Database\Eloquent\Builder|Section whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Section whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Section whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Section whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Section whereSectionableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Section whereSectionableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Section whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Section whereUpdatedAt($value)
 */
	class Section extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $service_category_id
 * @property int $service_sub_category_id
 * @property string $title
 * @property string $intro
 * @property string $description
 * @property-read int|null $price
 * @property string|null $price_description
 * @property int $discount
 * @property int $is_discount_fixed
 * @property string $billing_type
 * @property string $delivery_date
 * @property string $rating
 * @property \Illuminate\Database\Eloquent\Collection<int, \App\Models\Review> $reviews
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read int|null $reviews_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Section> $sections
 * @property-read int|null $sections_count
 * @property-read \App\Models\ServiceCategory $serviceCategory
 * @property-read \App\Models\ServiceSubCategory $serviceSubCategory
 * @method static \Database\Factories\ServiceFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Service newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Service newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Service query()
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereBillingType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereDeliveryDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereDiscount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereIntro($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereIsDiscountFixed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service wherePriceDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereReviews($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereServiceCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereServiceSubCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereUpdatedAt($value)
 */
	class Service extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ServiceSubCategory> $serviceSubCategories
 * @property-read int|null $service_sub_categories_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Service> $services
 * @property-read int|null $services_count
 * @method static \Database\Factories\ServiceCategoryFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceCategory whereUpdatedAt($value)
 */
	class ServiceCategory extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $service_category_id
 * @property string $name
 * @property string $image
 * @property string $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\ServiceCategory $serviceCategory
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Service> $services
 * @property-read int|null $services_count
 * @method static \Database\Factories\ServiceSubCategoryFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceSubCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceSubCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceSubCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceSubCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceSubCategory whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceSubCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceSubCategory whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceSubCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceSubCategory whereServiceCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceSubCategory whereUpdatedAt($value)
 */
	class ServiceSubCategory extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property mixed|null $basic
 * @property mixed|null $reference
 * @property mixed|null $payment
 * @property mixed|null $return_links
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\SettingFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Setting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting query()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereBasic($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting wherePayment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereReference($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereReturnLinks($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereUpdatedAt($value)
 */
	class Setting extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $tax_setting_id
 * @property int $from
 * @property int $to
 * @property int $difference
 * @property int $tax_percentage
 * @property string|null $min_tax
 * @property int|null $amount
 * @property int|null $is_discount_fixed
 * @property string|null $type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\TaxSetting|null $taxSettings
 * @method static \Illuminate\Database\Eloquent\Builder|Slot newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Slot newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Slot query()
 * @method static \Illuminate\Database\Eloquent\Builder|Slot whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slot whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slot whereDifference($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slot whereFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slot whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slot whereIsDiscountFixed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slot whereMinTax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slot whereTaxPercentage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slot whereTaxSettingId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slot whereTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slot whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slot whereUpdatedAt($value)
 */
	class Slot extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name different social platform names
 * @property string $icon class name for icons
 * @property string $link
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Database\Factories\SocialHandleFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|SocialHandle newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SocialHandle newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SocialHandle onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|SocialHandle query()
 * @method static \Illuminate\Database\Eloquent\Builder|SocialHandle whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialHandle whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialHandle whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialHandle whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialHandle whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialHandle whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialHandle whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialHandle withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|SocialHandle withoutTrashed()
 */
	class SocialHandle extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $project_id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Client> $clients
 * @property-read int|null $clients_count
 * @property-read \App\Models\Project $project
 * @method static \Database\Factories\TaskFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Task newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Task newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Task query()
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereUpdatedAt($value)
 */
	class Task extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $name
 * @property string|null $email
 * @property string|null $phone
 * @property string|null $tax_for
 * @property string|null $income_source
 * @property int|null $yearly_turnover
 * @property int|null $yearly_income
 * @property int|null $total_asset
 * @property int|null $rebate
 * @property int|null $deduction
 * @property int $has_applied_for_service
 * @property string|null $gender
 * @property string|null $message
 * @property mixed|null $tax
 * @property mixed|null $others
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\TaxCalculatorFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|TaxCalculator newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TaxCalculator newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TaxCalculator query()
 * @method static \Illuminate\Database\Eloquent\Builder|TaxCalculator whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaxCalculator whereDeduction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaxCalculator whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaxCalculator whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaxCalculator whereHasAppliedForService($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaxCalculator whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaxCalculator whereIncomeSource($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaxCalculator whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaxCalculator whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaxCalculator whereOthers($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaxCalculator wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaxCalculator whereRebate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaxCalculator whereTax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaxCalculator whereTaxFor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaxCalculator whereTotalAsset($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaxCalculator whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaxCalculator whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaxCalculator whereYearlyIncome($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaxCalculator whereYearlyTurnover($value)
 */
	class TaxCalculator extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string|null $name basic/deluxe etc
 * @property int|null $turnover_percentage for Turnover
 * @property int|null $income_percentage for Income
 * @property int|null $asset_percentage for Asset
 * @property int|null $min_tax 1
 * @property string|null $service 1
 * @property mixed|null $tax_free male:amount,female:amount
 * @property string $type
 * @property string $for
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Slot> $slots
 * @property-read int|null $slots_count
 * @method static \Database\Factories\TaxSettingFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|TaxSetting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TaxSetting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TaxSetting query()
 * @method static \Illuminate\Database\Eloquent\Builder|TaxSetting whereAssetPercentage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaxSetting whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaxSetting whereFor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaxSetting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaxSetting whereIncomePercentage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaxSetting whereMinTax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaxSetting whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaxSetting whereService($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaxSetting whereTaxFree($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaxSetting whereTurnoverPercentage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaxSetting whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaxSetting whereUpdatedAt($value)
 */
	class TaxSetting extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $avatar
 * @property string $comment
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\TestimonialFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Testimonial newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Testimonial newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Testimonial query()
 * @method static \Illuminate\Database\Eloquent\Builder|Testimonial whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Testimonial whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Testimonial whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Testimonial whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Testimonial whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Testimonial whereUpdatedAt($value)
 */
	class Testimonial extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\TrainingFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Training newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Training newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Training query()
 * @method static \Illuminate\Database\Eloquent\Builder|Training whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Training whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Training whereUpdatedAt($value)
 */
	class Training extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $app_name
 * @property string $app_logo
 * @property int $has_expert_btn
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\UiElementFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|UiElement newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UiElement newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UiElement query()
 * @method static \Illuminate\Database\Eloquent\Builder|UiElement whereAppLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UiElement whereAppName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UiElement whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UiElement whereHasExpertBtn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UiElement whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UiElement whereUpdatedAt($value)
 */
	class UiElement extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string|null $user_name
 * @property string|null $email
 * @property string|null $phone
 * @property string|null $admin_ref
 * @property string|null $division
 * @property string|null $district
 * @property string|null $thana
 * @property string|null $address
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string|null $image_url
 * @property string|null $refer_link
 * @property int|null $refer_discount_rate
 * @property string $password
 * @property string $total_commission
 * @property string $withdrawn_commission
 * @property string $remaining_commission
 * @property int $conversion
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Purchase> $approvedPurchases
 * @property-read int|null $approved_purchases_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Authentication> $authentications
 * @property-read int|null $authentications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Client> $clients
 * @property-read int|null $clients_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Exam> $exams
 * @property-read int|null $exams_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \App\Models\PartnerRequest|null $partnerRequest
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\PromoCode> $promoCodes
 * @property-read int|null $promo_codes_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Purchase> $purchases
 * @property-read int|null $purchases_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Referee> $referees
 * @property-read int|null $referees_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Result> $result
 * @property-read int|null $result_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Review> $reviews
 * @property-read int|null $reviews_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Role> $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\TaxCalculator> $taxCalulators
 * @property-read int|null $tax_calulators_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\UserDoc> $userDocs
 * @property-read int|null $user_docs_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\VideoComment> $video_comments
 * @property-read int|null $video_comments_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Video> $videos
 * @property-read int|null $videos_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Withdrawal> $withdrawals
 * @property-read int|null $withdrawals_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAdminRef($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereConversion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDistrict($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDivision($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereImageUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereReferDiscountRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereReferLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRemainingCommission($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereThana($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTotalCommission($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUserName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereWithdrawnCommission($value)
 */
	class User extends \Eloquent implements \Illuminate\Contracts\Auth\MustVerifyEmail {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int|null $map_id
 * @property int|null $user_id
 * @property int|null $expert_profile_id
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $district
 * @property string $thana
 * @property string $date
 * @property string $time
 * @property int $is_completed
 * @property int $is_physical
 * @property int $is_approved
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\ExpertProfile|null $expertProfile
 * @property-read \App\Models\Map|null $map
 * @property-read \App\Models\User|null $user
 * @method static \Database\Factories\UserAppointmentFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|UserAppointment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserAppointment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserAppointment query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserAppointment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAppointment whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAppointment whereDistrict($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAppointment whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAppointment whereExpertProfileId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAppointment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAppointment whereIsApproved($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAppointment whereIsCompleted($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAppointment whereIsPhysical($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAppointment whereMapId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAppointment whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAppointment wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAppointment whereThana($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAppointment whereTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAppointment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAppointment whereUserId($value)
 */
	class UserAppointment extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $user_id
 * @property int|null $fiscal_year_id
 * @property string $name
 * @property mixed|null $files [["file"=> filepath, "mime_type"=> mime_type]]
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\UserDocFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|UserDoc newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserDoc newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserDoc query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserDoc whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserDoc whereFiles($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserDoc whereFiscalYearId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserDoc whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserDoc whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserDoc whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserDoc whereUserId($value)
 */
	class UserDoc extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $course_id
 * @property string $title
 * @property string $video
 * @property string $section
 * @property string|null $description
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Course $course
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $users
 * @property-read int|null $users_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\VideoComment> $video_comments
 * @property-read int|null $video_comments_count
 * @method static \Database\Factories\VideoFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Video newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Video newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Video query()
 * @method static \Illuminate\Database\Eloquent\Builder|Video whereCourseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Video whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Video whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Video whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Video whereSection($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Video whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Video whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Video whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Video whereVideo($value)
 */
	class Video extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $user_id
 * @property int $video_id
 * @property string $comment
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @property-read \App\Models\Video $video
 * @method static \Illuminate\Database\Eloquent\Builder|VideoComment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|VideoComment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|VideoComment query()
 * @method static \Illuminate\Database\Eloquent\Builder|VideoComment whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VideoComment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VideoComment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VideoComment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VideoComment whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VideoComment whereVideoId($value)
 */
	class VideoComment extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int|null $user_id
 * @property string $account_type
 * @property string $account_no
 * @property string $amount
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Withdrawal newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Withdrawal newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Withdrawal query()
 * @method static \Illuminate\Database\Eloquent\Builder|Withdrawal whereAccountNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Withdrawal whereAccountType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Withdrawal whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Withdrawal whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Withdrawal whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Withdrawal whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Withdrawal whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Withdrawal whereUserId($value)
 */
	class Withdrawal extends \Eloquent {}
}

