<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Oumu extends Model
{
    //
    protected $table = "oumu";
    public $timestamps = true;
    protected $primaryKey = "id";
    protected $guarded = [];
    public static function establish(
        $student_id,
        $a1,
        $a2,
        $a3,
        $b1,
        $b2,
        $b3,
        $b4,
        $b5,
        $b6,
        $b7,
        $b8,
        $b9,
        $b10,
        $b11,
        $b12,
        $b13,
        $b14,
        $pd1,
        $pd2,
        $pd3
    )
    {
    try{
        $res = self::create(
             [
                'student_id' =>  $student_id,
                'a1'=>$a1,
                'a2'=>$a2,
                'a3'=>$a3,
                'b1'=>$b1,
                'b2'=>$b2,
                'b3'=>$b3,
                'b4'=>$b4,
                'b5'=>$b5,
                'b6'=>$b6,
                'b7'=>$b7,
                'b8'=>$b8,
                'b9'=>$b9,
                'b10'=>$b10,
                'b11'=>$b11,
                'b12'=>$b12,
                'b13'=>$b13,
                'b14'=>$b14,
                'pd1'=>$pd1,
                'pd2'=>$pd2,
                'pd3'=>$pd3
                ]
            );
            return $res ?
                $res :
                false;
        } catch (\Exception $e) {
            logError('搜索错误', [$e->getMessage()]);
            return false;
        }
    }

    public static function show($student_id)
    {
        try {
            $res = self::
            join('student', 'student.id', '=', 'oumu.student_id')
                ->where('student.id', '=', $student_id)
                ->select(
                    'student.student_name',
                    'student.student_level',
                    'student.student_spec',
                    'student.student_year',
                    'student.student_class',
                    'student.student_num',
                    'student.experiment_name',
                    'student.course_name',
                    'student.student_date',
                    'student.student_teacher',

                    'student.grade',
                    'student.grade_xp',

                    'student_id',
                    'a1',
                    'a2',
                    'a3',
                    'b1',
                    'b2',
                    'b3',
                    'b4',
                    'b5',
                    'b6',
                    'b7',
                    'b8',
                    'b9',
                    'b10',
                    'b11',
                    'b12',
                    'b13',
                    'b14',
                    'pd1',
                    'pd2',
                    'pd3'
                )->get();
            return $res ?
                $res :
                false;
        } catch (\Exception $e) {
            logError('搜索错误', [$e->getMessage()]);
            return false;
        }
    }
    /***
     * Auther:yjx
     * 图片判分
     */
    public static function toexamine($id,$g1,$g2)
    {
        try {
            $add=1;
            $res = self::where('student_id',$id)
                ->update(['gread_1'=>$g1,'gread_2'=>$g2]);

            $res2=Student::where('id','=',$id)->value('grade')+$g1+$g2;

            $res3 = Student::where('id',$id)
                ->update(['grade'=>$res2]);
           $res4=Student::where('id','=',$id)->update(['status'=>1]);
            return ($res&&$res3) ?
                $res :
                false;
        } catch (\Exception $e) {
            logError('搜索错误', [$e->getMessage()]);
            return false;
        }
    }

}
