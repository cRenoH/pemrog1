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
 * @property int $id
 * @property string $type
 * @property string $action
 * @property int|null $user_id
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ActivityLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ActivityLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ActivityLog query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ActivityLog whereAction($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ActivityLog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ActivityLog whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ActivityLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ActivityLog whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ActivityLog whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ActivityLog whereUserId($value)
 */
	class ActivityLog extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $user_id
 * @property string $address_name
 * @property string $full_address
 * @property string $city
 * @property string $province
 * @property string $postal_code
 * @property int $is_default
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Addresses newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Addresses newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Addresses query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Addresses whereAddressName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Addresses whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Addresses whereFullAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Addresses whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Addresses whereIsDefault($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Addresses wherePostalCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Addresses whereProvince($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Addresses whereUserId($value)
 */
	class Addresses extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $user_id
 * @property int $product_variant_id
 * @property int $quantity
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\ProductImages|null $ProductImage
 * @property-read \App\Models\ProductVariants $productVariant
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Carts newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Carts newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Carts query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Carts whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Carts whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Carts whereProductVariantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Carts whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Carts whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Carts whereUserId($value)
 */
	class Carts extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Categories newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Categories newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Categories query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Categories whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Categories whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Categories whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Categories whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Categories whereUpdatedAt($value)
 */
	class Categories extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $subject
 * @property string $message
 * @property int $is_read
 * @property \Illuminate\Support\Carbon $created_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ContactSubmissions newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ContactSubmissions newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ContactSubmissions query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ContactSubmissions whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ContactSubmissions whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ContactSubmissions whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ContactSubmissions whereIsRead($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ContactSubmissions whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ContactSubmissions whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ContactSubmissions whereSubject($value)
 */
	class ContactSubmissions extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $question
 * @property string $answer
 * @property int $order_column
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Faqs newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Faqs newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Faqs query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Faqs whereAnswer($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Faqs whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Faqs whereOrderColumn($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Faqs whereQuestion($value)
 */
	class Faqs extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $user_id
 * @property string $order_number
 * @property numeric $subtotal
 * @property numeric $shipping_cost
 * @property numeric $discount_amount
 * @property numeric $total_amount
 * @property string $shipping_address
 * @property string $payment_method
 * @property string $status
 * @property string|null $payment_due_at
 * @property string|null $payment_token
 * @property string|null $courier
 * @property int $return_requested
 * @property string|null $resi
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\OrderItem> $items
 * @property-read int|null $items_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\OrderReturn> $orderReturns
 * @property-read int|null $order_returns_count
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\OrderFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereCourier($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereDiscountAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereOrderNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order wherePaymentDueAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order wherePaymentMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order wherePaymentToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereResi($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereReturnRequested($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereShippingAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereShippingCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereSubtotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereTotalAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereUserId($value)
 */
	class Order extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $order_id
 * @property int|null $variant_id
 * @property int $quantity
 * @property numeric $price
 * @property-read \App\Models\Order $order
 * @property-read \App\Models\Order $orders
 * @property-read \App\Models\ProductVariants|null $variant
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderItem query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderItem whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderItem wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderItem whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderItem whereVariantId($value)
 */
	class OrderItem extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $order_id
 * @property int $user_id
 * @property string $reason
 * @property string $status
 * @property string|null $photo
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Order $order
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderReturn newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderReturn newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderReturn query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderReturn whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderReturn whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderReturn whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderReturn wherePhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderReturn whereReason($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderReturn whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderReturn whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderReturn whereUserId($value)
 */
	class OrderReturn extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string|null $content
 * @property string|null $meta_title
 * @property string|null $meta_description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pages newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pages newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pages query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pages whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pages whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pages whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pages whereMetaDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pages whereMetaTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pages whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pages whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pages whereUpdatedAt($value)
 */
	class Pages extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $product_id
 * @property string $image_path
 * @property int $is_primary
 * @property-read \App\Models\Products $product
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductImages newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductImages newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductImages query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductImages whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductImages whereImagePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductImages whereIsPrimary($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductImages whereProductId($value)
 */
	class ProductImages extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $product_id
 * @property string|null $sku
 * @property int $price
 * @property int|null $sale_price
 * @property int $stock
 * @property string|null $size
 * @property string|null $color_name
 * @property string|null $color_hex
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\OrderItem> $orderItems
 * @property-read int|null $order_items_count
 * @property-read \App\Models\Products $product
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductVariants newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductVariants newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductVariants query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductVariants whereColorHex($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductVariants whereColorName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductVariants whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductVariants wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductVariants whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductVariants whereSalePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductVariants whereSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductVariants whereSku($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductVariants whereStock($value)
 */
	class ProductVariants extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int|null $category_id
 * @property string $name
 * @property string $slug
 * @property string|null $description
 * @property string $status
 * @property string|null $meta_title
 * @property string|null $meta_description
 * @property string|null $shipping_info
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Categories|null $category
 * @property-read mixed $rating
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ProductImages> $images
 * @property-read int|null $images_count
 * @property-read \App\Models\ProductImages|null $primaryImage
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Reviews> $reviews
 * @property-read int|null $reviews_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ProductVariants> $variants
 * @property-read int|null $variants_count
 * @method static \Database\Factories\ProductsFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Products newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Products newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Products query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Products whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Products whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Products whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Products whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Products whereMetaDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Products whereMetaTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Products whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Products whereShippingInfo($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Products whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Products whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Products whereUpdatedAt($value)
 */
	class Products extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $user_id
 * @property int $product_id
 * @property int $rating
 * @property string|null $comment
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\ReviewsFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reviews newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reviews newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reviews query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reviews whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reviews whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reviews whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reviews whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reviews whereRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reviews whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reviews whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reviews whereUserId($value)
 */
	class Reviews extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $users
 * @property-read int|null $users_count
 * @method static \Database\Factories\RoleFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Role newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Role query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Role whereName($value)
 */
	class Role extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $key
 * @property string|null $value
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Settings newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Settings newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Settings query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Settings whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Settings whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Settings whereValue($value)
 */
	class Settings extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Subscribers newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Subscribers newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Subscribers query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Subscribers whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Subscribers whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Subscribers whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Subscribers whereUpdatedAt($value)
 */
	class Subscribers extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property int $is_admin
 * @property string|null $phone_number
 * @property string $password
 * @property string|null $remember_token
 * @property string|null $provider_name
 * @property string|null $provider_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Addresses> $addresses
 * @property-read int|null $addresses_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Order> $orders
 * @property-read int|null $orders_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Role> $roles
 * @property-read int|null $roles_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereIsAdmin($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereProviderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereProviderName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $user_id
 * @property int $product_id
 * @property-read \App\Models\Products $product
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Wishlist newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Wishlist newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Wishlist query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Wishlist whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Wishlist whereUserId($value)
 */
	class Wishlist extends \Eloquent {}
}

