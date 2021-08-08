<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Link;
class AdminLinkPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        //logged in admin
        $user = auth()->user();
        //requested route name
        $routeName = request()->route()->getName();
        //get link for current route name
        $link = Link::where('route', $routeName)->first();
        //if requested route name is exists in DB
        if($link){
            //check admin Links contains requested link
            $hasAdminThisLink = $user->links()->where('links.id', $link->id)->count();
            //if not have access redirect to NO ACCESS
            if(!$hasAdminThisLink){
                return redirect(route('admin.home'))->with('msg','لا يوجد صلاحية على الرابط المطلوب');
            }
        }
        return $next($request);
    }
}
