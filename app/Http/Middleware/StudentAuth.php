namespace App\Http\Middleware;

use Closure;

class StudentAuth
{
    public function handle($request, Closure $next)
    {
        if (!session('std_logged_in')) {
            return redirect()->route('stdlogin.form');
        }
        return $next($request);
    }
}
