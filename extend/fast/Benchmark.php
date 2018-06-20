<?php

namespace fast;

/**
 * 耗时测试
 * 
 * @example \fast\Benchmark::mark('1'); ... \fast\Benchmark::mark('2'); ... \fast\Benchmark::stop();
 */
class Benchmark
{
    static $_timeBench=[];

    /**
     * 标记
     *
     * @param string $markerId
     * @param void
     */
    public static function mark($markerId)
    {
        list($usec, $sec) = explode(' ', microtime());
        $time = ((float)$usec + (float)$sec);
        self::$_timeBench[$markerId] = $time;
    }

    /**
     * 比较两个版本号
     *
     * @param boolean $exit
     * @return void
     */
    public static function stop($exit=true)
    {
        self::mark('finish');
        $lastTime = $startTime = $p = 0;
        echo '<table cellpadding="3" cellspacing="1">
                <thead><tr style="border-bottom:1px solid silver"><td colspan="2" style="text-align:center">BENCHMARK</td></tr></thead>
                <tbody>';
        foreach(self::$_timeBench as $markerId=>$thisTime) {
            if ($p > 0) {
                echo '<tr><th style="text-align:right">till '.$markerId.': </th><td>'.number_format($thisTime-$lastTime, 6).'s</td></tr>';
            } else {
                $startTime = $thisTime;
            }
            $p++;
            $lastTime = $thisTime;
        }
        echo '</tbody><tfoot>
            <tr style="border-top:2px solid black"><th style="text-align:right">TOTAL: </th><td>'.number_format($lastTime-$startTime, 6).'s</td></tr>
        </tfoot>
        </table>';
        if($exit) exit;
    }
}