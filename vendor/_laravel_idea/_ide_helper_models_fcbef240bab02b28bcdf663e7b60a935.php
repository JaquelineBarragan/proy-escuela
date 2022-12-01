<?php //2d93105bcef7250a34ac61064986cf93
/** @noinspection all */

namespace App\Models {

    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\BelongsTo;
    use Illuminate\Database\Eloquent\Relations\HasMany;
    use Illuminate\Database\Eloquent\Relations\MorphTo;
    use Illuminate\Database\Eloquent\Relations\MorphToMany;
    use Illuminate\Notifications\DatabaseNotification;
    use Illuminate\Notifications\DatabaseNotificationCollection;
    use Illuminate\Support\Carbon;
    use Laravel\Sanctum\PersonalAccessToken;
    use LaravelIdea\Helper\App\Models\_IH_Brand_C;
    use LaravelIdea\Helper\App\Models\_IH_Brand_QB;
    use LaravelIdea\Helper\App\Models\_IH_Family_C;
    use LaravelIdea\Helper\App\Models\_IH_Family_QB;
    use LaravelIdea\Helper\App\Models\_IH_File_C;
    use LaravelIdea\Helper\App\Models\_IH_File_QB;
    use LaravelIdea\Helper\App\Models\_IH_Group_C;
    use LaravelIdea\Helper\App\Models\_IH_Group_QB;
    use LaravelIdea\Helper\App\Models\_IH_Log_C;
    use LaravelIdea\Helper\App\Models\_IH_Log_QB;
    use LaravelIdea\Helper\App\Models\_IH_Role_C;
    use LaravelIdea\Helper\App\Models\_IH_Role_QB;
    use LaravelIdea\Helper\App\Models\_IH_Tool_C;
    use LaravelIdea\Helper\App\Models\_IH_Tool_QB;
    use LaravelIdea\Helper\App\Models\_IH_User_C;
    use LaravelIdea\Helper\App\Models\_IH_User_QB;
    use LaravelIdea\Helper\Illuminate\Notifications\_IH_DatabaseNotification_QB;
    use LaravelIdea\Helper\Laravel\Sanctum\_IH_PersonalAccessToken_C;
    use LaravelIdea\Helper\Laravel\Sanctum\_IH_PersonalAccessToken_QB;
    
    /**
     * @property int $id
     * @property string $name
     * @property Carbon|null $created_at
     * @property Carbon|null $updated_at
     * @method static _IH_Brand_QB onWriteConnection()
     * @method _IH_Brand_QB newQuery()
     * @method static _IH_Brand_QB on(null|string $connection = null)
     * @method static _IH_Brand_QB query()
     * @method static _IH_Brand_QB with(array|string $relations)
     * @method _IH_Brand_QB newModelQuery()
     * @method false|int increment(string $column, float|int $amount = 1, array $extra = [])
     * @method false|int decrement(string $column, float|int $amount = 1, array $extra = [])
     * @method static _IH_Brand_C|Brand[] all()
     * @foreignLinks id,\App\Models\Tool,brand_id
     * @mixin _IH_Brand_QB
     */
    class Brand extends Model {}
    
    /**
     * @property int $id
     * @property string $name
     * @property Carbon|null $created_at
     * @property Carbon|null $updated_at
     * @method static _IH_Family_QB onWriteConnection()
     * @method _IH_Family_QB newQuery()
     * @method static _IH_Family_QB on(null|string $connection = null)
     * @method static _IH_Family_QB query()
     * @method static _IH_Family_QB with(array|string $relations)
     * @method _IH_Family_QB newModelQuery()
     * @method false|int increment(string $column, float|int $amount = 1, array $extra = [])
     * @method false|int decrement(string $column, float|int $amount = 1, array $extra = [])
     * @method static _IH_Family_C|Family[] all()
     * @foreignLinks id,\App\Models\Tool,family_id
     * @mixin _IH_Family_QB
     */
    class Family extends Model {}
    
    /**
     * @property int $id
     * @property int $fileable_id
     * @property string $fileable_type
     * @property string $name
     * @property string $path
     * @property Carbon|null $created_at
     * @property Carbon|null $updated_at
     * @property Model $fileable
     * @method MorphTo fileable()
     * @method static _IH_File_QB onWriteConnection()
     * @method _IH_File_QB newQuery()
     * @method static _IH_File_QB on(null|string $connection = null)
     * @method static _IH_File_QB query()
     * @method static _IH_File_QB with(array|string $relations)
     * @method _IH_File_QB newModelQuery()
     * @method false|int increment(string $column, float|int $amount = 1, array $extra = [])
     * @method false|int decrement(string $column, float|int $amount = 1, array $extra = [])
     * @method static _IH_File_C|File[] all()
     * @mixin _IH_File_QB
     */
    class File extends Model {}
    
    /**
     * @property int $id
     * @property string $name
     * @property Carbon|null $created_at
     * @property Carbon|null $updated_at
     * @method static _IH_Group_QB onWriteConnection()
     * @method _IH_Group_QB newQuery()
     * @method static _IH_Group_QB on(null|string $connection = null)
     * @method static _IH_Group_QB query()
     * @method static _IH_Group_QB with(array|string $relations)
     * @method _IH_Group_QB newModelQuery()
     * @method false|int increment(string $column, float|int $amount = 1, array $extra = [])
     * @method false|int decrement(string $column, float|int $amount = 1, array $extra = [])
     * @method static _IH_Group_C|Group[] all()
     * @foreignLinks id,\App\Models\Tool,group_id
     * @mixin _IH_Group_QB
     */
    class Group extends Model {}
    
    /**
     * @property int $id
     * @property int $user_id
     * @property int $tool_id
     * @property string $comment
     * @property string $type
     * @property string|null $before
     * @property string|null $after
     * @property Carbon|null $created_at
     * @property Carbon|null $updated_at
     * @property Tool $tool
     * @method BelongsTo|_IH_Tool_QB tool()
     * @property User $user
     * @method BelongsTo|_IH_User_QB user()
     * @method static _IH_Log_QB onWriteConnection()
     * @method _IH_Log_QB newQuery()
     * @method static _IH_Log_QB on(null|string $connection = null)
     * @method static _IH_Log_QB query()
     * @method static _IH_Log_QB with(array|string $relations)
     * @method _IH_Log_QB newModelQuery()
     * @method false|int increment(string $column, float|int $amount = 1, array $extra = [])
     * @method false|int decrement(string $column, float|int $amount = 1, array $extra = [])
     * @method static _IH_Log_C|Log[] all()
     * @ownLinks user_id,\App\Models\User,id|tool_id,\App\Models\Tool,id
     * @mixin _IH_Log_QB
     */
    class Log extends Model {}
    
    /**
     * @property int $id
     * @property string $name
     * @property Carbon|null $created_at
     * @property Carbon|null $updated_at
     * @method static _IH_Role_QB onWriteConnection()
     * @method _IH_Role_QB newQuery()
     * @method static _IH_Role_QB on(null|string $connection = null)
     * @method static _IH_Role_QB query()
     * @method static _IH_Role_QB with(array|string $relations)
     * @method _IH_Role_QB newModelQuery()
     * @method false|int increment(string $column, float|int $amount = 1, array $extra = [])
     * @method false|int decrement(string $column, float|int $amount = 1, array $extra = [])
     * @method static _IH_Role_C|Role[] all()
     * @foreignLinks id,\App\Models\User,role_id
     * @mixin _IH_Role_QB
     */
    class Role extends Model {}
    
    /**
     * @property int $id
     * @property string|null $item
     * @property string $description
     * @property int|null $group_id
     * @property int $family_id
     * @property int $brand_id
     * @property string|null $model
     * @property string|null $serial_number
     * @property Carbon|null $calibration_expiration
     * @property bool $dispatchable
     * @property bool|null $has_validation
     * @property string $main_localization
     * @property string|null $shelf_localization
     * @property string|null $shelf
     * @property string $measurement
     * @property int $user_id
     * @property float|null $min_stock
     * @property float $quantity
     * @property Carbon|null $created_at
     * @property Carbon|null $updated_at
     * @property Carbon|null $deleted_at
     * @property Brand $brand
     * @method BelongsTo|_IH_Brand_QB brand()
     * @property Family $family
     * @method BelongsTo|_IH_Family_QB family()
     * @property _IH_File_C|File[] $files
     * @property-read int $files_count
     * @method MorphToMany|_IH_File_QB files()
     * @property Group|null $group
     * @method BelongsTo|_IH_Group_QB group()
     * @property _IH_Log_C|Log[] $logs
     * @property-read int $logs_count
     * @method HasMany|_IH_Log_QB logs()
     * @property User $user
     * @method BelongsTo|_IH_User_QB user()
     * @method static _IH_Tool_QB onWriteConnection()
     * @method _IH_Tool_QB newQuery()
     * @method static _IH_Tool_QB on(null|string $connection = null)
     * @method static _IH_Tool_QB query()
     * @method static _IH_Tool_QB with(array|string $relations)
     * @method _IH_Tool_QB newModelQuery()
     * @method false|int increment(string $column, float|int $amount = 1, array $extra = [])
     * @method false|int decrement(string $column, float|int $amount = 1, array $extra = [])
     * @method static _IH_Tool_C|Tool[] all()
     * @ownLinks group_id,\App\Models\Group,id|family_id,\App\Models\Family,id|brand_id,\App\Models\Brand,id|user_id,\App\Models\User,id
     * @foreignLinks id,\App\Models\Log,tool_id
     * @mixin _IH_Tool_QB
     */
    class Tool extends Model {}
    
    /**
     * @property int $id
     * @property int $role_id
     * @property string $email
     * @property string $password
     * @property string|null $remember_token
     * @property Carbon|null $created_at
     * @property Carbon|null $updated_at
     * @property Carbon|null $deleted_at
     * @property _IH_Log_C|Log[] $logs
     * @property-read int $logs_count
     * @method HasMany|_IH_Log_QB logs()
     * @property DatabaseNotificationCollection|DatabaseNotification[] $notifications
     * @property-read int $notifications_count
     * @method MorphToMany|_IH_DatabaseNotification_QB notifications()
     * @property DatabaseNotificationCollection|DatabaseNotification[] $readNotifications
     * @property-read int $read_notifications_count
     * @method MorphToMany|_IH_DatabaseNotification_QB readNotifications()
     * @property Role $role
     * @method BelongsTo|_IH_Role_QB role()
     * @property _IH_PersonalAccessToken_C|PersonalAccessToken[] $tokens
     * @property-read int $tokens_count
     * @method MorphToMany|_IH_PersonalAccessToken_QB tokens()
     * @property _IH_Tool_C|Tool[] $tools
     * @property-read int $tools_count
     * @method HasMany|_IH_Tool_QB tools()
     * @property DatabaseNotificationCollection|DatabaseNotification[] $unreadNotifications
     * @property-read int $unread_notifications_count
     * @method MorphToMany|_IH_DatabaseNotification_QB unreadNotifications()
     * @method static _IH_User_QB onWriteConnection()
     * @method _IH_User_QB newQuery()
     * @method static _IH_User_QB on(null|string $connection = null)
     * @method static _IH_User_QB query()
     * @method static _IH_User_QB with(array|string $relations)
     * @method _IH_User_QB newModelQuery()
     * @method false|int increment(string $column, float|int $amount = 1, array $extra = [])
     * @method false|int decrement(string $column, float|int $amount = 1, array $extra = [])
     * @method static _IH_User_C|User[] all()
     * @ownLinks role_id,\App\Models\Role,id
     * @foreignLinks id,\App\Models\Tool,user_id|id,\App\Models\Log,user_id
     * @mixin _IH_User_QB
     */
    class User extends Model {}
}