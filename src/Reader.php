<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/14
 * Time: 22:48
 */
namespace metooweb\phpexcel;

/**
 * Class Reader
 * @package metooweb\phpexcel\Reader
 * @property \PHPExcel $excel;
 * @property \PHPExcel_Worksheet $sheet;
 */
class Reader
{
    protected $file;
    protected $sheet;
    protected $excel;

    public function file($file){
        $this->file = $file;
        $this->excel = \PHPExcel_IOFactory::load($file);
        return $this;
    }

    public function sheet($index = 0){

        $this->sheet = $this->excel->getSheet($index);
        return $this;
    }

    public function line($index=0){

        empty($this->sheet) && $this->sheet();

        echo $this->sheet->getCellByColumnAndRow(1,1)->getValue();




    }



}