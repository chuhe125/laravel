<?php

namespace App\Http\Controllers;

use App\Http\Requests\OumuRequest;
use App\Http\Requests\PdfRequest;
use App\Http\Requests\Studentrequest;
use App\Models\Oumu;
use App\Models\Student;
use Illuminate\Http\Request;
use Mpdf;
class OumuController extends Controller
{
    //
    /***
     * Auther:yjx
     * 欧姆表改装设计实验
     * 存入学生信息并返回id
     */
    public static function student(StudentRequest $request){


        $res = Student::establish($request['student_name'],$request['student_level'],$request['student_spec'],$request['student_year'],
                                  $request['student_class'],$request['student_num'] ,$request['experiment_name'] ,
                                  $request['course_name'],$request['student_date'],$request['student_teacher']);
        return $res ?
            json_success('操作成功!', $res, 200) :
            json_fail('操作失败!', null, 100);
    }
    /***
     * Auther:yjx
     * 欧姆表改装设计实验
     * 存入实验信息
     */
    public function oumu(OumuRequest $request)
    {
        $student_id=$request['student_id'];
        $a1=$request['a1'];
        $a2=$request['a2'];
        $a3=$request['a3'];
        $b1=$request['b1'];
        $b2=$request['b2'];
        $b3=$request['b3'];
        $b4=$request['b4'];
        $b5=$request['b5'];
        $b6=$request['b6'];
        $b7=$request['b7'];
        $b8=$request['b8'];
        $b9=$request['b9'];
        $b10=$request['b10'];
        $b11=$request['b11'];
        $b12=$request['b12'];
        $b13=$request['b13'];
        $b14=$request['b14'];
        $pd1=$request['pd1'];
        $pd2=$request['pd2'];
        $pd3=$request['pd3'];

        $res1       = Oumu::establish(
           $request['student_id'],
           $request['a1'],
           $request['a2'],
           $request['a3'],
           $request['b1'],
           $request['b2'],
           $request['b3'],
           $request['b4'],
           $request['b5'],
           $request['b6'],
           $request['b7'],
           $request['b8'],
           $request['b9'],
           $request['b10'],
           $request['b11'],
           $request['b12'],
           $request['b13'],
           $request['b14'],
           $request['pd1'],
           $request['pd2'],
           $request['pd3']
        );
        $grade      = 0;
        $grade_xp   = 0;
        if ($a1 == 500) {
            $grade += 5;
        }
        if ($a2 == 560) {
            $grade += 5;
        }
        if ($a3 == 1.5) {
            $grade += 5;
        }
        if ($b1 == "E/Ig-Rg") {
            $grade += 5;
        }
        if ($b2 == 1.5) {
            $grade += 5;
        }
        if ($b3 == 500) {
            $grade += 5;
        }
        if ($b4 == 560) {
            $grade += 5;
        }
        if ($b5 == 2440) {
            $grade += 5;
        }
        if ($b6 == 1.5) {
            $grade += 5;
        }
        if ($b7 == 2440) {
            $grade += 5;
        }
        if ($b8 == 560) {
            $grade += 5;
        }
        if ($b9 == 43.5) {
            $grade += 5;
        }
        if ($b10 <=2443.0&&$b10 >=2440.9 ) {
            $grade += 5;
        }
        if ($b11<=44.0&&$b11 >= 43.0) {
            $grade += 5;
        }
        if ($b12<=275&&$b12>=20) {
            $grade += 5;
        }
        // 13 - 14 是截图 分别是4分和6分
        if ($pd1 == 1) {
            $grade += 5;
        }
        if ($pd2 == 1) {
            $grade += 5;
        }
        if ($pd3 == 1) {
            $grade += 5;
        }

        $grade = $grade + $grade_xp;

        $res2 = Student::grade($student_id, $grade, $grade_xp);

        $res['res1'] = $res1;
        $res['res2'] = $res2;

        return ($res['res1']&&$res['res2']) ?
            json_success('操作成功!', null, 200) :
            json_fail('操作失败!', null, 100);
    }
    /***
     * Auther:yjx
     * 导出欧姆表的pdf
     */
    public function pdf(PdfRequest $request)
    {

        $student_id = $request['student_id'];

        $student_a = oumu::show($student_id);

        $student_b = json_decode($student_a);

        $a1= $student_b[0]->a1;
        $a2= $student_b[0]->a2;
        $a3= $student_b[0]->a3;
        $b1= $student_b[0]->b1;
        $b2= $student_b[0]->b2;
        $b3= $student_b[0]->b3;
        $b4= $student_b[0]->b4;
        $b5= $student_b[0]->b5;
        $b6= $student_b[0]->b6;
        $b7= $student_b[0]->b7;
        $b8= $student_b[0]->b8;
        $b9= $student_b[0]->b9;
        $b10=$student_b[0]->b10;
        $b11=$student_b[0]->b11;
        $b12=$student_b[0]->b12;
        $b13=$student_b[0]->b13;
        $b14=$student_b[0]->b14;
        $pd1= $student_b[0]->pd1;
        $pd2= $student_b[0]->pd2;
        $pd3= $student_b[0]->pd3;

        $student_name = $student_b[0]->student_name;
        $student_level = $student_b[0]->student_level;
        $student_spec = $student_b[0]->student_spec;
        $student_year = $student_b[0]->student_year;
        $student_class = $student_b[0]->student_class;
        $student_num = $student_b[0]->student_num;
        $experiment_name = $student_b[0]->experiment_name;
        $course_name = $student_b[0]->course_name;
        $student_date = $student_b[0]->student_date;
        $student_teacher = $student_b[0]->student_teacher;
        $grade = $student_b[0]->grade;
        $grade_xp = $student_b[0]->grade_xp;

        if($pd1==1){
            $pd1='对';
        }else{
            $pd1='错';
        }
        if($pd2==1){
            $pd2='对';
        }else{
            $pd2='错';
        }
        if($pd3==1){
            $pd3='对';
        }else{
            $pd3='错';
        }
        $res = view('oumu', [
            'name' => $student_name,
            'student_level' => $student_level,
            'student_spec' => $student_spec,
            'student_year' => $student_year,
            'experiment_name' => $experiment_name,
            'course_name' => $course_name,
            'student_date' => $student_date,
            'student_teacher' => $student_teacher,
            'student_num' => $student_num,
            'student_class' => $student_class,
            'grade' => $grade,
            'grade_xp' => $grade_xp,
            'grade_tk' => ($grade - $grade_xp),

            'a1' => $a1,
            'a2' => $a2,
            'a3' => $a3,
            'b1' => $b1,
            'b2' => $b2,
            'b3' => $b3,
            'b4' => $b4,
            'b5' => $b5,
            'b6' => $b6,
            'b7' => $b7,
            'b8' => $b8,
            'b9' => $b9,
            'b10'=> $b10,
            'b11'=>$b11,
            'b12'=>$b12,
            'b13'=>$b13,
            'b14'=>$b14,
            'pd1' => $pd1,
            'pd2' => $pd2,
            'pd3'=>$pd3

        ]);
        $mpdf = new Mpdf\Mpdf(['utf-8', 'A4', 16, '', 10, 10, 15, 15]);

        $mpdf->showImageErrors = true;

        $mpdf->WriteHTML($res);

        $mpdf->Output('实验报告.pdf', "I");

        exit;
    }
    /***
     * Auther:yjx
     * 审批图片
     */
    public static function examine(Request $request)
    {
        $id=$request['student_id'];
        $a=$request['gread_1'];
        $b=$request['gread_2'];
        $res=Oumu::toexamine($id,$a,$b);
        return $res?   //判断
            json_success("判分成功",null,200):
            json_fail("判分失败",null,100);
    }
//    public  static  function status(Request  $request){
//        $id=$request['student_id'];
//        $res=Student::ex_status($id);
//        return $res?   //判断
//            json_success("已判分",null,200):
//            json_fail("未判分",null,100);
//    }
    /***
     *Auther:yjx
     * 实验查询
     */
    public static function query(Request $request)
    {
        $na=$request['experiment_name'];

        $res=Student::toquery($na);
        return $res?   //判断
            json_success("查询成功",$res,200):
            json_fail("查询失败",null,100);
    }

}
