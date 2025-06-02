<?php

namespace App\Modules\Authentication\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Modules\Role\Models\Role;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
//    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
  /*  protected $fillable = [
        'name',
        'email',
        'password',
    ];*/

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
/*    protected $hidden = [
        'password',
        'remember_token',
    ];*/

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
/*    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }*/

    /**
     * Get the roles that belong to the user.
     */
/*    public function roles()
    {
        return $this->belongsToMany(
            Role::class,
            'role_user', // Specify pivot table name
            'user_id',   // Foreign key on pivot table for this model
            'role_id'    // Foreign key on pivot table for related model
        );
    }*/

    /**
     * Check if the user has a specific role.
     */
/*    public function hasRole($role)
    {
        // Change the implementation from using a query to using the collection
        if (!$this->relationLoaded('roles')) {
            $this->load('roles');
        }

        return $this->roles->contains('slug', $role);
    }*/

    /**
     * Assign a role to the user.
     */
/*    public function assignRole($role)
    {
        if (is_string($role)) {
            $role = Role::where('slug', $role)->firstOrFail();
        }

        if ($role instanceof Role) {
            $this->roles()->syncWithoutDetaching([$role->id]);
        }

        return $this;
    }*/


    /**
     * Remove a role from the user.
     */
 /*   public function removeRole($role)
    {
        if (is_string($role)) {
            $role = Role::where('slug', $role)->firstOrFail();
        }

        $this->roles()->detach($role);

        return $this;
    }*/

    /**
     * Check if the user is an admin.
     */
 /*   public function isAdmin()
    {
        return $this->hasRole('admin');
    }*/

    /**
     * Check if the user is an organizer.
     */
 /*   public function isOrganizer()
    {
        return $this->hasRole('organizer');
    }*/

    /**
     * Check if the user is an editor.
     */
  /*  public function isEvaluator()
    {
        return $this->hasRole('evaluator');
    }*/

    /**
     * Check if the user is a regular user.
     */
/*    public function isParticipant()
    {
        return $this->hasRole('participant');
    }*/

/*    public function getRolesDisplay()
    {
        $roles = $this->roles()->get();
        $rolesList = $roles->pluck('slug')->toArray();

        return [
            'count' => $roles->count(),
            'roles' => $rolesList,
            'admin_exists' => in_array('admin', $rolesList)
        ];
    }*/

    use HasFactory, Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'role', 'status', 'institution', 'points'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'last_activity' => 'datetime',
        'password' => 'hashed',
    ];

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopeByRole($query, $role)
    {
        return $query->where('role', $role);
    }

    public function scopeByStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    public function scopeByInstitution($query, $institution)
    {
        return $query->where('institution', $institution);
    }

    public function scopeSearch($query, $search)
    {
        return $query->where(function ($q) use ($search) {
            $q->where('name', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%");
        });
    }

    // Accessors
    public function getAvatarAttribute()
    {
        return strtoupper(substr($this->name, 0, 2));
    }

    public function getLastActivityFormattedAttribute()
    {
        if (!$this->last_activity) {
            return 'Never';
        }
        return $this->last_activity->diffForHumans();
    }

    public function getRoleBadgeColorAttribute()
    {
        return match ($this->role) {
            'admin' => 'role-admin',
            'instructor' => 'role-instructor',
            'evaluator' => 'role-evaluator',
            'student' => 'role-student',
            default => 'role-student'
        };
    }

    public function getStatusBadgeColorAttribute()
    {
        return match ($this->status) {
            'active' => 'status-active',
            'pending' => 'status-pending',
            'suspended' => 'status-suspended',
            'inactive' => 'status-inactive',
            default => 'status-pending'
        };
    }

    // Static methods for statistics
    public static function getStatistics()
    {
        return [
            'total' => self::count(),
            'students' => self::where('role', 'student')->count(),
            'instructors' => self::where('role', 'instructor')->count(),
            'evaluators' => self::where('role', 'evaluator')->count(),
            'admins' => self::where('role', 'admin')->count(),
            'active' => self::where('status', 'active')->count(),
            'pending' => self::where('status', 'pending')->count(),
            'suspended' => self::where('status', 'suspended')->count(),
            'inactive' => self::where('status', 'inactive')->count(),
        ];
    }

    public static function getInstitutions()
    {
        return self::whereNotNull('institution')
            ->distinct()
            ->pluck('institution')
            ->sort()
            ->values();
    }
}
