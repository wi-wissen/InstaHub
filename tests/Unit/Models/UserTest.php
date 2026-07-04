<?php

use App\Facades\RequestHub;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

/*
|--------------------------------------------------------------------------
| App\Models\User (primary-DB-only behaviour)
|--------------------------------------------------------------------------
|
| Covers permission matrix, token bookkeeping, age/profile helpers,
| relationships that only need the primary database (hubs()), hidden
| attributes, cryptpw() and the creating() boot hook that stamps
| tokens_max outside of hub context.
|
| Anything that needs the tenant-only `follows`/`photos` tables (isfollowing,
| following(), followers(), photos(), getSuggested()) lives in
| tests/Feature/Hub/Models/UserHubTest.php instead.
*/

describe('allowed()', function () {
    it('always allows the "user" role regardless of the actual role', function ($role) {
        $user = User::factory()->make(['role' => $role]);

        expect($user->allowed('user'))->toBeTrue();
    })->with(['user', 'dba', 'teacher', 'admin']);

    it('allows "dba" for dba, teacher and admin roles but not for user', function () {
        expect(User::factory()->make(['role' => 'dba'])->allowed('dba'))->toBeTrue();
        expect(User::factory()->make(['role' => 'teacher'])->allowed('dba'))->toBeTrue();
        expect(User::factory()->make(['role' => 'admin'])->allowed('dba'))->toBeTrue();
        expect(User::factory()->make(['role' => 'user'])->allowed('dba'))->toBeFalse();
    });

    it('allows "teacher" for teacher and admin roles but not for user or dba', function () {
        expect(User::factory()->make(['role' => 'teacher'])->allowed('teacher'))->toBeTrue();
        expect(User::factory()->make(['role' => 'admin'])->allowed('teacher'))->toBeTrue();
        expect(User::factory()->make(['role' => 'user'])->allowed('teacher'))->toBeFalse();
        expect(User::factory()->make(['role' => 'dba'])->allowed('teacher'))->toBeFalse();
    });

    it('allows "admin" only for the admin role', function () {
        expect(User::factory()->make(['role' => 'admin'])->allowed('admin'))->toBeTrue();
        expect(User::factory()->make(['role' => 'teacher'])->allowed('admin'))->toBeFalse();
        expect(User::factory()->make(['role' => 'dba'])->allowed('admin'))->toBeFalse();
        expect(User::factory()->make(['role' => 'user'])->allowed('admin'))->toBeFalse();
    });

    it('rejects unknown role checks entirely', function () {
        expect(User::factory()->make(['role' => 'admin'])->allowed('superadmin'))->toBeFalse();
    });
});

describe('hasTokens()', function () {
    it('is true when remaining tokens are >= the requested amount', function () {
        $user = User::factory()->make(['tokens_max' => 100, 'tokens_used' => 90]);

        expect($user->hasTokens(10))->toBeTrue();
        expect($user->hasTokens())->toBeTrue(); // default amount = 1
    });

    it('is false once the requested amount exceeds the remaining budget', function () {
        $user = User::factory()->make(['tokens_max' => 100, 'tokens_used' => 90]);

        expect($user->hasTokens(11))->toBeFalse();
    });

    it('is false when tokens are fully exhausted', function () {
        $user = User::factory()->make(['tokens_max' => 10, 'tokens_used' => 10]);

        expect($user->hasTokens())->toBeFalse();
    });
});

describe('age()', function () {
    it('returns "unknown" when there is no birthday', function () {
        $user = User::factory()->make(['birthday' => null]);

        expect($user->age())->toBe('unknown');
    });

    it('computes the age in full years from the birthday', function () {
        $user = User::factory()->make(['birthday' => now()->subYears(25)->subDays(1)]);

        expect($user->age())->toBe(25);
    });

    it('returns "unknown" when the computed interval exceeds 2000 years (sentinel birthday)', function () {
        // Historically used as an "unset"/sentinel birthday; the interval in
        // years vastly exceeds 2000, which age() treats as "unknown".
        $user = User::factory()->make(['birthday' => '9999-12-31']);

        expect($user->age())->toBe('unknown');
    });
});

describe('getProfileDescriptionAttribute()', function () {
    it('is empty when there is no city, country, gender or known age', function () {
        $user = User::factory()->make([
            'city' => null, 'country' => null, 'gender' => null, 'birthday' => null,
        ]);

        expect($user->profile_description)->toBe('');
    });

    it('renders city+country together', function () {
        $user = User::factory()->make([
            'city' => 'Berlin', 'country' => 'Germany', 'gender' => null, 'birthday' => null,
        ]);

        expect($user->profile_description)->toBe('is from Berlin (Germany)');
    });

    it('renders only the country when there is no city', function () {
        $user = User::factory()->make([
            'city' => null, 'country' => 'Germany', 'gender' => null, 'birthday' => null,
        ]);

        expect($user->profile_description)->toBe('is from Germany');
    });

    it('ignores a city without a country', function () {
        $user = User::factory()->make([
            'city' => 'Berlin', 'country' => null, 'gender' => null, 'birthday' => null,
        ]);

        expect($user->profile_description)->toBe('');
    });

    it('renders only the gender when nothing else is known', function () {
        $user = User::factory()->make([
            'city' => null, 'country' => null, 'gender' => 'female', 'birthday' => null,
        ]);

        expect($user->profile_description)->toBe('is female');
    });

    it('renders only the age when nothing else is known', function () {
        $user = User::factory()->make([
            'city' => null, 'country' => null, 'gender' => null, 'birthday' => now()->subYears(30),
        ]);

        expect($user->profile_description)->toBe('is 30 years old');
    });

    it('joins exactly two parts with "and"', function () {
        $user = User::factory()->make([
            'city' => null, 'country' => 'Germany', 'gender' => 'male', 'birthday' => null,
        ]);

        expect($user->profile_description)->toBe('is from Germany and is male.');
    });

    it('joins three parts with commas and a trailing "and"', function () {
        $user = User::factory()->make([
            'city' => 'Berlin', 'country' => 'Germany', 'gender' => 'male', 'birthday' => now()->subYears(20),
        ]);

        expect($user->profile_description)->toBe('is from Berlin (Germany), is male and is 20 years old.');
    });
});

describe('hidden attributes', function () {
    it('hides password and remember_token from array/json representations', function () {
        $user = User::factory()->create();

        $array = $user->toArray();

        expect($array)->not->toHaveKey('password');
        expect($array)->not->toHaveKey('remember_token');
    });
});

describe('cryptpw()', function () {
    it('bcrypt-hashes a plain text password and persists it', function () {
        $user = User::factory()->create();
        $user->forceFill(['password' => 'plaintext-password'])->save();

        $user->cryptpw();

        expect($user->password)->not->toBe('plaintext-password');
        expect(str_starts_with($user->password, '$2y$'))->toBeTrue();
        expect($user->fresh()->password)->toBe($user->password);
    });

    it('leaves a password alone once it already looks like a $2y$10$ bcrypt hash', function () {
        $user = User::factory()->create();
        $fakeHash = '$2y$10$'.str_repeat('a', 53);
        $user->forceFill(['password' => $fakeHash])->save();

        $user->cryptpw();

        expect($user->password)->toBe($fakeHash);
    });
});

describe('hubs() relationship', function () {
    it('returns the hubs created by this teacher', function () {
        $teacher = User::factory()->teacher()->create();
        $otherTeacher = User::factory()->teacher()->create();

        $ownHub = \App\Models\Hub::factory()->create(['teacher_id' => $teacher->id]);
        \App\Models\Hub::factory()->create(['teacher_id' => $otherTeacher->id]);

        $hubs = $teacher->hubs;

        expect($hubs)->toHaveCount(1);
        expect($hubs->first()->id)->toBe($ownHub->id);
    });
});

describe('boot() creating hook', function () {
    it('sets tokens_max from config outside of hub context', function () {
        $user = User::factory()->create();

        expect($user->tokens_max)->toBe(config('openai.max_tokens'));
    });

    it('does not override an explicitly provided tokens_max while inside a hub', function () {
        RequestHub::shouldReceive('isHub')->andReturn(true);

        $user = User::factory()->create(['tokens_max' => 42]);

        expect($user->tokens_max)->toBe(42);
    });
});
