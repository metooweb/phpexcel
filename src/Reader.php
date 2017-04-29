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

    public static function init(){

        return new self();
    }

    public function file($file){
        $this->file = $file;
        $this->excel = \PHPExcel_IOFactory::load($file);
        return $this;
    }

    public function sheet($index = 0){

        $this->sheet = $this->excel->getSheet($index);
        return $this;
    }

    /**
     * read line data
     * @param int $startRow
     * @param string $startColumn
     * @param null $endRow
     * @param null $endColum
     * @return array
     */
    public function line($startRow = 1 , $startColumn = 'A' , $endRow = null ,  $endColum = null ){
        empty($this->sheet) && $this->sheet();
        $ret = [];
        $rowIterator = $this->sheet->getRowIterator( $startRow , $endRow );
        foreach ($rowIterator as $key=>$value){
            $line = [];
            $cellIterator = $value->getCellIterator($startColumn , $endColum);
            foreach ( $cellIterator as $cell){
                $line[] = $cell->getValue();
            }
            $ret[] = $line;
        }

        return $ret;
    }



}