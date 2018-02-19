<? php namespace App\Traits;

trait Menubar
{
    Public function print()
    {
        $user = Auth::user();
        
        
        
        if ($user->level='Mahasiswa')
        {
            $list[Dosen]=
        }
        
        if ($user->level='Dosen')
        {
            $list[
        }
        if ($user->level='Admin')
        {
            $list[
        }
    }
}