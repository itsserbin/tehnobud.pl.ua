<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\User
 *
 * @mixin IdeHelperUser
 * @property int $id
 * @property string $name
 * @property string $login
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLogin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class IdeHelperUser extends \Eloquent {}
}

namespace App\ReadModels{
/**
 * Class Building
 *
 * @package App\ReadModels
 * @mixin IdeHelperBuilding
 * @property string $id
 * @property int $priority
 * @property array $name
 * @property array $slug
 * @property array $status
 * @property string|null $status_color
 * @property array $address
 * @property array $description
 * @property array|null $coordinate
 * @property int $is_active
 * @property string|null $price
 * @property int|null $floors
 * @property float|null $total_area
 * @property array|null $heating
 * @property array|null $overlapping
 * @property array|null $material
 * @property array|null $view
 * @property bool $parking
 * @property array $additional_information
 * @property \Illuminate\Support\Carbon|null $started_at
 * @property \Illuminate\Support\Carbon|null $ended_at
 * @property string $district_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\ReadModels\District $district
 * @property-read string $price_format
 * @property-read array $translations
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\ReadModels\LiveBlog[] $liveBlogs
 * @property-read int|null $live_blogs_count
 * @property-read \App\ReadModels\Slider|null $mainPhoto
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\ReadModels\Plan[] $plans
 * @property-read int|null $plans_count
 * @property-read \App\ReadModels\Presentation|null $presentation
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\ReadModels\Slider[] $sliders
 * @property-read int|null $sliders_count
 * @method static \Database\Factories\ReadModels\BuildingFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Building filterName(?string $name = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Building newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Building newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Building orderByField(?string $orderBy = null, ?string $order_direction = 'ASC')
 * @method static \Illuminate\Database\Eloquent\Builder|Building query()
 * @method static \Illuminate\Database\Eloquent\Builder|Building whereAdditionalInformation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Building whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Building whereCoordinate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Building whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Building whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Building whereDistrictId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Building whereEndedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Building whereFloors($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Building whereHeating($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Building whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Building whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Building whereMaterial($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Building whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Building whereOverlapping($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Building whereParking($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Building wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Building wherePriority($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Building whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Building whereStartedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Building whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Building whereStatusColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Building whereTotalArea($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Building whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Building whereView($value)
 */
	class IdeHelperBuilding extends \Eloquent {}
}

namespace App\ReadModels{
/**
 * App\ReadModels\City
 *
 * @mixin IdeHelperCity
 * @property string $id
 * @property array $name
 * @property array $slug
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\ReadModels\District[] $districts
 * @property-read int|null $districts_count
 * @property-read array $translations
 * @method static \Database\Factories\ReadModels\CityFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|City filterName(?string $name = null)
 * @method static \Illuminate\Database\Eloquent\Builder|City newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|City newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|City query()
 * @method static \Illuminate\Database\Eloquent\Builder|City whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereUpdatedAt($value)
 */
	final class IdeHelperCity extends \Eloquent {}
}

namespace App\ReadModels{
/**
 * App\ReadModels\District
 *
 * @mixin IdeHelperDistrict
 * @property string $id
 * @property array $name
 * @property array $slug
 * @property string $city_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\ReadModels\Building[] $building
 * @property-read int|null $building_count
 * @property-read \App\ReadModels\City $city
 * @property-read array $translations
 * @method static \Database\Factories\ReadModels\DistrictFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|District filterName(?string $name = null)
 * @method static \Illuminate\Database\Eloquent\Builder|District newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|District newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|District orderByField(?string $orderBy = null, ?string $order_direction = 'ASC')
 * @method static \Illuminate\Database\Eloquent\Builder|District query()
 * @method static \Illuminate\Database\Eloquent\Builder|District whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|District whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|District whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|District whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|District whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|District whereUpdatedAt($value)
 */
	final class IdeHelperDistrict extends \Eloquent {}
}

namespace App\ReadModels{
/**
 * App\ReadModels\LiveBlog
 *
 * @mixin IdeHelperLiveBlog
 * @property string $id
 * @property array $name
 * @property array $description
 * @property array $videos
 * @property \Illuminate\Support\Carbon $published_at
 * @property string $building_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property array $slug
 * @property-read \App\ReadModels\Building $building
 * @property-read array $translations
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\ReadModels\LiveBlogMedia[] $images
 * @property-read int|null $images_count
 * @method static \Illuminate\Database\Eloquent\Builder|LiveBlog filterBuildingId(?\Ramsey\Uuid\UuidInterface $id = null)
 * @method static \Illuminate\Database\Eloquent\Builder|LiveBlog filterName(?string $name = null)
 * @method static \Illuminate\Database\Eloquent\Builder|LiveBlog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LiveBlog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LiveBlog orderByField(?string $orderBy = null, ?string $order_direction = 'ASC')
 * @method static \Illuminate\Database\Eloquent\Builder|LiveBlog query()
 * @method static \Illuminate\Database\Eloquent\Builder|LiveBlog whereBuildingId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LiveBlog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LiveBlog whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LiveBlog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LiveBlog whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LiveBlog wherePublishedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LiveBlog whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LiveBlog whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LiveBlog whereVideos($value)
 */
	class IdeHelperLiveBlog extends \Eloquent {}
}

namespace App\ReadModels{
/**
 * App\ReadModels\LiveBlogMedia
 *
 * @mixin IdeHelperLiveBlogMedia
 * @property string $id
 * @property string $path
 * @property string $live_blog_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\ReadModels\LiveBlog $LiveBlog
 * @property-read string|null $media
 * @method static \Illuminate\Database\Eloquent\Builder|LiveBlogMedia newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LiveBlogMedia newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LiveBlogMedia query()
 * @method static \Illuminate\Database\Eloquent\Builder|LiveBlogMedia whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LiveBlogMedia whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LiveBlogMedia whereLiveBlogId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LiveBlogMedia wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LiveBlogMedia whereUpdatedAt($value)
 */
	class IdeHelperLiveBlogMedia extends \Eloquent {}
}

namespace App\ReadModels{
/**
 * App\ReadModels\Plan
 *
 * @mixin IdeHelperPlan
 * @property string $id
 * @property array $name
 * @property string $path
 * @property string $building_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $priority
 * @property-read \App\ReadModels\Building $building
 * @property-read string $plan
 * @property-read array $translations
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\ReadModels\Room[] $rooms
 * @property-read int|null $rooms_count
 * @method static \Illuminate\Database\Eloquent\Builder|Plan filterBuildingId(?\Ramsey\Uuid\UuidInterface $id = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Plan filterName(?string $name = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Plan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Plan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Plan orderByField(?string $orderBy = null, ?string $order_direction = 'ASC')
 * @method static \Illuminate\Database\Eloquent\Builder|Plan query()
 * @method static \Illuminate\Database\Eloquent\Builder|Plan whereBuildingId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plan whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plan whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plan wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plan wherePriority($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plan whereUpdatedAt($value)
 */
	class IdeHelperPlan extends \Eloquent {}
}

namespace App\ReadModels{
/**
 * Class Presentation
 *
 * @package App\ReadModels
 * @mixin IdeHelperPresentation
 * @property string $id
 * @property string $path_pdf
 * @property string $path
 * @property string $building_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\ReadModels\Building $building
 * @property-read string $pdf
 * @property-read string $photo
 * @method static \Illuminate\Database\Eloquent\Builder|Presentation filterBuildingId(?\Ramsey\Uuid\UuidInterface $id = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Presentation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Presentation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Presentation query()
 * @method static \Illuminate\Database\Eloquent\Builder|Presentation whereBuildingId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Presentation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Presentation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Presentation wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Presentation wherePathPdf($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Presentation whereUpdatedAt($value)
 */
	class IdeHelperPresentation extends \Eloquent {}
}

namespace App\ReadModels{
/**
 * App\ReadModels\Room
 *
 * @mixin IdeHelperRoom
 * @property string $id
 * @property array $name
 * @property string $color
 * @property int $is_sale
 * @property string $path
 * @property int $number_room
 * @property string $coordinate
 * @property string $plan_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $area
 * @property-read string $photo
 * @property-read array $translations
 * @property-read \App\ReadModels\Plan $plan
 * @method static \Illuminate\Database\Eloquent\Builder|Room filterName(?string $name = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Room newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Room newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Room orderByField(?string $orderBy = null, ?string $order_direction = 'ASC')
 * @method static \Illuminate\Database\Eloquent\Builder|Room query()
 * @method static \Illuminate\Database\Eloquent\Builder|Room whereArea($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Room whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Room whereCoordinate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Room whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Room whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Room whereIsSale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Room whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Room whereNumberRoom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Room wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Room wherePlanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Room whereUpdatedAt($value)
 */
	class IdeHelperRoom extends \Eloquent {}
}

namespace App\ReadModels{
/**
 * App\ReadModels\Slider
 *
 * @mixin IdeHelperSlider
 * @property string $id
 * @property string $path
 * @property int $priority
 * @property string $building_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\ReadModels\Building $building
 * @property-read string|null $url
 * @method static \Illuminate\Database\Eloquent\Builder|Slider newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Slider newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Slider orderByField(?string $orderBy = null, ?string $order_direction = 'ASC')
 * @method static \Illuminate\Database\Eloquent\Builder|Slider query()
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereBuildingId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider wherePriority($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereUpdatedAt($value)
 */
	class IdeHelperSlider extends \Eloquent {}
}

