<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = "student";
    public $timestamps = true;
    protected $primaryKey = "id";
    protected $guarded = [];

    public static function establish($student_name,$student_level, $student_spec,$student_year, $student_num, $student_class, $experiment_name,$course_name,$student_date,$student_teacher)
    {

        try {
            Student::create(
                [
                    'student_name' => $student_name,
                    'student_level' => $student_level,
                    'student_spec' => $student_spec,
                    'student_year' => $student_year,
                    'student_class' => $student_class,
                    'student_num' => $student_num,
                    'experiment_name' => $experiment_name,
                    'course_name' => $course_name,
                    'student_date' => $student_date,
                    'student_teacher' => $student_teacher
                ]

            );
            $res = Student::where('student_num','=',$student_num)
                ->get('id');

            return $res ?
                $res :
                false;
        } catch (\Exception $e) {
            logError('搜索错误', [$e->getMessage()]);
            return false;
        }
    }

    public static function grade($student_id, $grade,$grade_xp)
    {
        try {

            $res = Student::where('student.id', '=', $student_id)

                ->update(['grade' => $grade,'grade_xp' => $grade_xp]);

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
            $res = Student::
            join('shiyan2', 'student.id', '=', 'shiyan2.student_id')
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

                    'shiyan2.ds1',
                    'shiyan2.ds2',
                    'shiyan2.ds3',
                    'shiyan2.ds4',
                    'shiyan2.ds5',
                    'shiyan2.ds6',
                    'shiyan2.l1',
                    'shiyan2.l2',
                    'shiyan2.l3',
                    'shiyan2.m',
                    'shiyan2.d',
                    'shiyan2.sk1',
                    'shiyan2.sk2',
                    'shiyan2.pd1',
                    'shiyan2.pd2',
                    'shiyan2.pd3'


                )->get();

            return $res ?
                $res :
                false;
        } catch (\Exception $e) {
            logError('搜索错误', [$e->getMessage()]);
            return false;
        }


    }

}
