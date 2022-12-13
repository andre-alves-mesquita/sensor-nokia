<?php


namespace App\Http\Controllers;

use phpseclib3\Net\SSH2 as ssh2;

class Monitoring extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    public function interface127()
    {

        try {

            $ssh = new ssh2(env('IP_MONITORING'), env('PORT_MONITORING'));
            if (!$ssh->login(env('USER_MONITORING'), env('PASSWORD_MONITORING'))) {
                throw new \Exception('Login failed');
            }

            $ssh->read(':~$');
            $ssh->write("show port 1/2/7 optical detail\n \n");
            $ms3 = $ssh->read(':~$');

            $texto = preg_split('/\n|\r\n?/', $ms3);

            $info = [];

            for ($i = 26; $i < 31; $i++) {
                $arr1 = substr($texto[$i], 0, 26);
                $arr2 = substr($texto[$i], 29, -44);
                $arr3 = substr($texto[$i], 39, -34);
                $arr4 = substr($texto[$i], 50, -23);
                $arr5 = substr($texto[$i], 61, -12);
                $arr6 = substr($texto[$i], 72, -1);
                array_push($info, [$arr1, $arr2, $arr3, $arr4, $arr5, $arr6]);
            }

            $aar = [
                "prtg" => [
                    "result" => [
                        [
                            "channel" =>  $info[4][0],
                            "value" => (float)$info[4][1],
                            "float" => "1",
                            "DecimalMode" => "all",
                            "unit" => "custom",
                            "customunit" => "dBm"
                        ],
                        [
                            "channel" => $info[3][0],
                            "value" => (float)$info[3][1],
                            "float" => "1",
                            "DecimalMode" => "all",
                            "unit" => "custom",
                            "customunit" => "dBm"
                        ],
                        [
                            "channel" =>  $info[2][0],
                            "value" => (float)$info[2][1],
                            "float" => "1",
                            "DecimalMode" => "all",
                            "unit" => "custom",
                            "customunit" => "mA"
                        ],
                        [
                            "channel" =>  $info[1][0],
                            "value" => (float)$info[1][1],
                            "float" => "1",
                            "DecimalMode" => "all",
                            "unit" => "custom",
                            "customunit" => "V"
                        ],
                        [
                            "channel" =>  $info[0][0],
                            "value" => (float)$info[0][1],
                            "float" => "1",
                            "DecimalMode" => "all",
                            "unit" => "custom",
                            "customunit" => "C"
                        ],

                    ],
                    "text" => "The sensor's message"
                ]
            ];

            $teste = json_encode($aar);
        } catch (\Exception $e) {
            return response($e->getMessage(), 500);
        }

        return response($teste, 200);
    }


    public function interface137()
    {
        try {

            $ssh = new ssh2(env('IP_MONITORING'), env('PORT_MONITORING'));
            if (!$ssh->login(env('USER_MONITORING'), env('PASSWORD_MONITORING'))) {
                throw new \Exception('Login failed');
            }

            $ssh->read(':~$');
            $ssh->write("show port 1/2/7 optical detail\n \n");
            $ms3 = $ssh->read(':~$');

            $texto = preg_split('/\n|\r\n?/', $ms3);

            $info = [];

            for ($i = 26; $i < 31; $i++) {
                $arr1 = substr($texto[$i], 0, 26);
                $arr2 = substr($texto[$i], 29, -44);
                $arr3 = substr($texto[$i], 39, -34);
                $arr4 = substr($texto[$i], 50, -23);
                $arr5 = substr($texto[$i], 61, -12);
                $arr6 = substr($texto[$i], 72, -1);
                array_push($info, [$arr1, $arr2, $arr3, $arr4, $arr5, $arr6]);
            }

            $aar = [
                "prtg" => [
                    "result" => [
                        [
                            "channel" =>  $info[4][0],
                            "value" => (float)$info[4][1],
                            "float" => "1",
                            "DecimalMode" => "all",
                            "unit" => "custom",
                            "customunit" => "dBm"
                        ],
                        [
                            "channel" => $info[3][0],
                            "value" => (float)$info[3][1],
                            "float" => "1",
                            "DecimalMode" => "all",
                            "unit" => "custom",
                            "customunit" => "dBm"
                        ],
                        [
                            "channel" =>  $info[2][0],
                            "value" => (float)$info[2][1],
                            "float" => "1",
                            "DecimalMode" => "all",
                            "unit" => "custom",
                            "customunit" => "mA"
                        ],
                        [
                            "channel" =>  $info[1][0],
                            "value" => (float)$info[1][1],
                            "float" => "1",
                            "DecimalMode" => "all",
                            "unit" => "custom",
                            "customunit" => "V"
                        ],
                        [
                            "channel" =>  $info[0][0],
                            "value" => (float)$info[0][1],
                            "float" => "1",
                            "DecimalMode" => "all",
                            "unit" => "custom",
                            "customunit" => "C"
                        ],

                    ],
                    "text" => "The sensor's message"
                ]
            ];

            $teste = json_encode($aar);
        } catch (\Exception $e) {
            return response($e->getMessage(), 500);
        }

        return response($teste, 200);
    }
}
