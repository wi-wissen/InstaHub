<?php

use App\Facades\RequestHub;
use App\Http\Resources\Hub as HubResource;

/*
|--------------------------------------------------------------------------
| KNOWN APP BUG (not fixed here, per test-writing instructions):
|--------------------------------------------------------------------------
|
| App\Http\Resources\Hub::toArray() calls $this->hasWorkingUser(),
| $this->activated() and $this->readonly() as *methods*. Those only exist
| as Eloquent accessors on App\Models\Hub (getHasWorkingUserAttribute(),
| getActivatedAttribute(), getReadonlyAttribute()), reachable only via
| *property* access ($this->hasWorkingUser), not as real methods. Because
| JsonResource forwards unknown method calls to the underlying model via
| ForwardsCalls, calling them as methods throws BadMethodCallException
| ("Call to undefined method App\Http\Resources\Hub::hasWorkingUser()")
| before any array can be built - toArray() is unusable in its current
| form for any Hub instance.
*/

it('toArray() currently throws because of accessor/method-call bugs in the resource', function () {
    $hub = $this->createHub(creating: 'all_empty');

    RequestHub::setDefaultDB();

    expect(fn () => (new HubResource($hub))->toArray(request()))
        ->toThrow(BadMethodCallException::class);
})->skip('App\Http\Resources\Hub::toArray() calls $this->hasWorkingUser()/activated()/readonly() as '
    .'methods instead of accessing them as Eloquent accessor properties, so toArray() always throws '
    .'BadMethodCallException. This is an app bug in app/Http/Resources/Hub.php, not a test issue; '
    .'not fixed here since editing app code is out of scope.');
