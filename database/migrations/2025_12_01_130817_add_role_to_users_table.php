<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function handle(Request $request, Closure $next)
{
    if (auth()->check() && auth()->user()->role === 'admin') {
        return $next($request);
    }

    // Jika bukan admin, tendang ke dashboard siswa atau home
    return redirect('/student/dashboard')->with('error', 'Anda tidak memiliki akses admin.');
}
};
