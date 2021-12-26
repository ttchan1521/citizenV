<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\admin;
use App\Models\b1;
use App\Models\b2;

class phantich extends Controller
{
    //
    public function index() {
        if (!(Session::has('user'))) {
            return redirect()->route('login');
        }
        if (Session::get('user')->position == "b2") {
            return \redirect()->route('admin.input_citizen');
        }
        else {
            $name = Session::get('user')->name;
            $down = $this->nameDown(Session::get('user')->position);
            $data = $this->quanEachYear();
            $sinh = $this->sinhEachYear();
            $tu = $this->tuEachYear();
            $ccNam = $this->getCocauNam();
            $ccNu = $this->getCocauNu();
            $cc = 0;
            foreach ($ccNam as $nam) {
                $cc += $nam;
            }

            foreach($ccNu as $nu) {
                $cc += $nu;
            }
            
            // if ($cc != 0) {
            //     foreach($ccNam as $nam) {
            //         $nam = $nam/$cc * 100;
            //         $nam = \round($nam, 1);
            //         $nam = -$nam;
            //     }
            //     foreach($ccNu as $nu ){
            //         $nu = $nu/$cc * 100;
            //         $nu = \round($nu, 1);
            //     }
            // }
            if ($cc != 0) {
                foreach($ccNam as $i => $nam) {
                    $ccNam[$i] = $nam/$cc * 100;
                    $ccNam[$i] = \round($ccNam[$i], 1);
                    $ccNam[$i] = -$ccNam[$i];
                }
                foreach($ccNu as $i => $nu ){
                    $ccNu[$i] = $nu/$cc * 100;
                    $ccNu[$i] = \round($ccNu[$i], 1);
                }
            }
            $male = $this->maleEachYear();
            $female = $this->femaleEachYear();

            $young = $this->youngEachYear();
            $work = $this->workEachYear();
            $old = $this->oldEachYear();
            
            $level = $this->getLevel();

            $job = $this->eachJob();
            return view('aSite.bieudophantich', ['user' => Session::get('user'), 'down' =>$down, 'year' => $data[0], 'data' => $data[1], 
                        'sinh' => $sinh[1], 'tu' => $tu[1], 'ccNam' => $ccNam, 'ccNu' => $ccNu, 'cc' => $cc, 'male' => $male[1], 'female' => $female[1],
                        'young' => $young[1], 'work' => $work[1], 'old' => $old[1],'level0' => $level[0], 'level1' => $level[1], 'level2' => $level[2], 
                        'level3' => $level[3], 'level4' => $level[4], 'level5' => $level[5], 'job' => $job]);
        }
    }

    function quanEachYear() {
        $admin = $this->declareAd();

        return $admin->quanEachYear();
    }

    function sinhEachYear() {
        $admin = $this->declareAd();

        return $admin->sinhEachYear();
    }

    function tuEachYear() {
        $admin = $this->declareAd();
        return $admin->tuEachYear();
    }

    function getCocauNu() {
        $admin = $this->declareAd();
        return $admin->getCocauNu();
    }

    function getCocauNam() {
        $admin = $this->declareAd();
        return $admin->getCocauNam();
    }

    function maleEachYear() {
        $admin = $this->declareAd();
        return $admin->maleEachYear();
    }

    function femaleEachYear() {
        $admin = $this->declareAd();
        return $admin->femaleEachYear();
    }

    function youngEachYear() {
        $admin = $this->declareAd();
        return $admin->youngEachYear();
    }
    
    function workEachYear() {
        $admin = $this->declareAd();
        return $admin->workEachYear();
    }

    function oldEachYear() {
        $admin = $this->declareAd();
        return $admin->oldEachYear();
    }

    function getLevel() {
        $admin = $this->declareAd();
        return $admin->levelEachYear();
    }

    function eachJob() {
        $admin = $this->declareAd();
        return $admin->eachJob();
    }
    function declareAd() {
        $admin = new admin(Session::get('user')->id, Session::get('user')->name);
        if (Session::get('user')->position == "b1") {
            $admin = new b1(Session::get('user')->id, Session::get('user')->name);
        }
        if (Session::get('user')->position == "b2") {
            $admin = new b2(Session::get('user')->id, Session::get('user')->name);
        }

        return $admin;
    }

    function nameDown($position) {
        if ($position == "a1") {
            return "tỉnh/thành phố";
        }
        elseif ($position == "a2") {
            return "quận/huyện";
        }
        elseif ($position == "a3") {
            return "xã/phường";
        }
        return "thôn/bản";
    }
}
