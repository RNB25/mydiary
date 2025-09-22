<<<<<<< HEAD
require cviebrock/eloquent-sluggable untuk buat slug otomatis

model user.php
use Cviebrock\EloquentSluggable\Sluggable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, Sluggable;

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    // ...
}
=======
# mydiary
aplikasi curhat online yang didukung oleh ahli psikologis
>>>>>>> 3b0e3be6c9ef63b362d399f603b5625c7e7b9e33
