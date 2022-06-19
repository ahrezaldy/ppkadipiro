<?php
 
namespace App\Http\Controllers\Laporan;
 
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Constants\DateConstant;
use App\Http\Controllers\Controller;
use App\Models\House;
 
class IuranController extends Controller
{
    public function index()
    {
        Auth::loginUsingId(2);
        $today = now();

        $title = 'Laporan Iuran ' . $today->format('Y');
        $monthMap = DateConstant::MONTH_MAP;
        $item = House::whereNotNull('last_iuran')->get();
        $item->map(function ($house) use ($today, $monthMap) {
            $house->last_iuran_map = $this->transformLastIuranMap($house->last_iuran, $today, $monthMap);
            return $house;
        });

        $view = 'voyager::ppkadipiro.laporan.iuran';
        return view(
            $view,
            compact(
                'title',
                'today',
                'monthMap',
                'item',
            )
        );
    }

    private function transformLastIuranMap(Carbon $lastIuran, Carbon $today, ?array $monthMap = null): array
    {
        $lastIuranMap = [];
        $thisYear = $today->format('Y');
        $lastIuranYear = $lastIuran->format('Y');
        if (is_null($monthMap)) {
            $monthMap = DateConstant::MONTH_MAP;
        }

        $allYearClear = false;
        if ($thisYear < $lastIuranYear) {
            $allYearClear = true;
        }
        $allYearFail = false;
        if ($thisYear > $lastIuranYear) {
            $allYearFail = true;
        }

        $lastIuranMonth = $lastIuran->format('m');
        foreach ($monthMap as $key => $value) {
            $lastIuranMap[$key] = false;
            if ($allYearFail) {
                continue;
            }
            if ($allYearClear || $key <= $lastIuranMonth) {
                $lastIuranMap[$key] = true;
            }
        }
        return $lastIuranMap;
    }
}
