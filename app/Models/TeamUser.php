<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * App\Models\TeamUser.
 *
 * @property int $team_id
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TeamUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TeamUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TeamUser query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TeamUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TeamUser whereTeamId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TeamUser whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TeamUser whereUserId($value)
 * @mixin \Eloquent
 */
class TeamUser extends Pivot
{
    //
}
