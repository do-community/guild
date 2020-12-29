<?php

namespace App\Models;

use App\Events\BadgeEarned;
use Illuminate\Database\Eloquent\Model;

class Badge extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'color', 'gray', 'description', 'details', 'award_message', 'requirement_class', 'requirement_value'
    ];

    public function users(){
    	return $this->belongsToMany('\App\Models\User');
    }

    public static function checkIfUserEarnedBadge()
    {
        $badges = Badge::where('team_id', auth()->user()->currentTeam->id)->get();
        foreach($badges as $badge){
            if( !auth()->user()->hasBadge($badge->id) ){
                switch ($badge->requirement_class) {
                    case 'team':
                        $badge->checkTeamBadge($badge);
                        break;
                    case 'task':
                        $badge->checkTaskBadge($badge);
                        break;
                    case 'shift':
                        $badge->checkShiftBadge($badge);
                        break;
                    case 'feed':
                        $badge->checkFeedBadge($badge);
                        break;
                    default:
                        break;
                }
            }
        }
    }

    public function checkTeamBadge($badge)
    {
        if ($badge->requirement_value <= auth()->user()->allTeams()->count() ) {
            event(new BadgeEarned($badge));
        }
    }

    public function checkTaskBadge($badge)
    {
        if ($badge->requirement_value <= auth()->user()->completedTasks()->count() ) {
            event(new BadgeEarned($badge));
        }
    }

    public function checkShiftBadge($badge)
    {
        $total_hours = auth()->user()->shifts()->first();
        if($total_hours){
            if ($badge->requirement_value <= $total_hours->total_hours ) {
                event(new BadgeEarned($badge));
            }
        }
    }

    public function checkFeedBadge($badge)
    {
        if ($badge->requirement_value <= auth()->user()->posts()->count() ) {
            event(new BadgeEarned($badge));
        }
    }
}
