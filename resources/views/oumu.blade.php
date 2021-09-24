<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="https://gitee.com/cuckoo-of-life/imgs/raw/master/20210914140406.ico" type="image/x-icon">
    <title>欧姆表改装设计实验</title>
    <style>
        div {
            margin: 0 auto;
            width:556px;
        }
    </style>
</head>

<body>
    <div>
        <div style="display: flex;position: relative;height: 60px;border-bottom: 1px solid #464545;">

            <div>

                <img src="https://s3.bmp.ovh/imgs/2021/08/0bf5497e7adffd54.png" style="height: 40px;" />

            </div>

            <span style="position: absolute;left: 50%;top:50%;height: 50%;transform: translate(-50%,-50%);color: #898989;font-size: 14px;">《{{$name}}》学生实验报告</span>

        </div>

        <!-- 标题 -->

        <div style="margin: 0 auto;text-align: center;padding-bottom: 20px;padding-top: 3px;">

            <span style="font-size: 23px;">《{{$name}}》学生实验（项目）报告</span>

        </div>

        <!-- 学生信息 -->

        <h3>一、基本信息</h3>

        <table border="1" cellpadding="5" cellspacing="0" style="margin: 0 auto;">

            <tr>

                <td>实验项目名称</td>

                <td colspan="3">{{$experiment_name}}</td>

            </tr>

            <tr>

                <td>课程名称</td>

                <td>{{$course_name}}</td>

                <td>学生层次</td>

                <td>{{$student_level}}</td>

            </tr>

            <tr>

                <td>学生专业</td>

                <td>{{$student_spec}}</td>

                <td>学生年级</td>

                <td>{{$student_year}}</td>

            </tr>

            <tr>

                <td>学生班级</td>

                <td>{{$student_class}}</td>

                <td>学生学号</td>

                <td>{{$student_num}}</td>

            </tr>

            <tr>

                <td>学生姓名</td>

                <td>{{$name}}</td>

                <td>完成日期</td>

                <td>{{$student_date}}</td>

            </tr>

            <tr>

                <td>指导教师</td>

                <td>{{$student_teacher}}</td>
                <td>报告总分</td>

                <td>{{$grade}}</td>

            </tr>

        </table>


        <h3>二、实验目的</h3>
            <div style="text-indent: 2em;">
                使用微安表500µA档位进行实验电路设计, 实现欧姆表的基本功能。要求改装后的欧姆表量程比率为×1Ω。
            </div>


        <h3>三、实验仪器与设备</h3>
            <div style="text-indent: 2em;">①	500µA微安表一个</div>
            <div style="text-indent: 2em;">②	六档位多档开关一组</div>
            <div style="text-indent: 2em;">③	9999.9型电阻箱三个</div>
            <div style="text-indent: 2em;">④	红黑表笔一副</div>
            <div style="text-indent: 2em;">⑤	1.5V电池一节</div>
            <div style="text-indent: 2em;">⑥	单刀开关一个</div>
            <div style="text-indent: 2em;">⑦	待测信号箱</div>

        <h3>四、实验原理</h3>
            <div style="text-align:center;">
                <img src="https://gitee.com/cuckoo-of-life/img4/raw/master/20210923174059.png" alt="">
            </div>
            <div style="text-indent: 2em;margin: 10px auto;">
                欧姆计的原理电路如图所示，其中虚线框部分为欧姆计，E为电源（干电池），表头内组为Rg，满刻度电流为Ig，R为限流电阻，a和b为两接线柱（表笔插孔），Rx为待测电阻。由欧姆定律可知，电路中的电流Ix由下式决定：
            </div>
            <div style="text-align:center;">
                <img src="https://gitee.com/cuckoo-of-life/img4/raw/master/20210923174157.png" alt="">
            </div>
            <div style="text-indent: 2em;">
                对于给定的欧姆计（Rg、R、E已给定），Ix仅由Rx决定，即Ix与Rx之间有一一对应的关系。在表头刻度上，将Ix标示成Rx，即成欧姆计。
            </div>
            <div style="text-indent: 2em;margin: 10px auto;">由上式可知，当Rx无穷大时，Ix=0，指针无偏转；当Rx=0时，回路中电流最大，指针满偏，此时Ix=Imax=E/(Rg+R)=Ig。由此可知：</div>
            <div style="text-indent: 2em;margin: 6px auto;font-size: 14px;">1） 当Rx=Rg+R时，Ix=1/2Ig，指针正好位于满刻度的一半，即欧姆计标尺的中心电阻值，它等于该欧姆计的总内阻。这就是欧姆中心的意义，可将上式改写成：Ix=E/(RΩ+Rx)</div>
            <div style="text-indent: 2em;margin: 6px auto;font-size: 14px;">2）改变中心电阻RΩ的值，即可改变电阻档的量程。如RΩ=100Ω，测量范围为20至500Ω。</div>
            <div style="text-indent: 2em;margin: 6px auto;font-size: 14px;">3）由于Ix与RΩ+Rx是非线性关系。当Rx≪RΩ时，有Ix≈E/RΩ =Ig，此时偏转接近满刻度，随Rx的变化不明显，因而测量误差大；当Rx≫RΩ时，Ix≈0，因而测量误差也大。所以在实际测量时，只在1/5RΩ	&lt;Rx	&lt;5RΩ的范围，测量才比较准确。</div>
            <div style="text-indent: 2em;margin: 6px auto;font-size: 14px;">4）由于电源在使用过程中会变化，因此用R来经常调零（Rx=0，Ix=Imax）。</div>
        <h3>五、实验内容与步骤</h3>
            <div style="text-align: center;">
                <img src="https://gitee.com/cuckoo-of-life/img4/raw/master/20210923174533.png" alt="">
            </div>
            <div style="text-indent: 2em;">
                从微安表表盘读取表头满量程电流Ig和对应的表头内阻Rg，并机械调零。按照改装要求，连接电路，根据改装后的欧姆表量程比率为×1Ω的要求，调节调零电阻（校准电阻支路保持断路，红黑表笔短路，调节调零电阻的大小使表针满偏）和校准电阻（校准电阻支路接入电路，连接100Ω标准电阻，调节校准电阻的大小使表针对准100）值，完成仪器的调节，并测量出待测信号箱的未知电阻值，并记录数据。
            </div>

        <h3>六、实验数据记录与处理</h3>
            <h4 style="text-indent: 2em;">1.	待改装微安表参数记录<span style="color: rgb(101, 194, 248);font-size: 14px;">（每空5分，共15分）</span></h4>
            <table border="1" cellpadding="5" cellspacing="0" style="margin: 0 auto;">
                <tr>
                    <td style="width:200px;">微安表表头满量程电流Ig</td>
                    <td style="color: red;width:100px;text-align:center;">{{$a1}}</td>
                    <td style="width:50px;text-align:center;">μA</td>
                </tr>
                <tr>
                    <td>表头内阻Rg</td>
                    <td style="color: red;text-align: center;">{{$a2}}</td>
                    <td style="text-align: center;">Ω</td>
                </tr>
                <tr>
                    <td>电池电压E</td>
                    <td style="color: red;text-align: center;">{{$a3}}</td>
                    <td style="text-align: center;">V</td>
                </tr>
            </table>

            <h4 style="text-indent: 2em;">2.	各电阻阻值设置计算<span style="color: rgb(101, 194, 248);font-size: 14px;">（要求四舍五入精确到小数点后1位，每空5分，共45分）</span></h4>
            <div style="text-indent: 4em;">1)	调零电阻R1计算（理论值）</div>
            <div style="text-indent: 6em;margin: 5px auto;">
                ①	根据电路图，单刀开关开启，短接红黑表笔，此时调零电阻计算公式为：R1=<span style="color: red;border-bottom: 1px solid black;padding: 0px 10px;;"> {{$b1}}  </span>
            </div>
            <div style="text-indent: 6em;margin: 5px auto;">
                ②	代入E= <span style="color: red;text-align: center;border-bottom: 1px solid black;">{{$b2}} </span> V,Ig= <span style="color: red;text-align: center;border-bottom: 1px solid black;">{{$b3}}</span> μA, Rg=  <span style="color: red;text-align: center;border-bottom: 1px solid black;">{{$b4}}</span> Ω
            </div>
            <div style="text-indent: 6em;margin: 5px auto;">
                ③	计算出R1=  <span style="color: red;text-align: center;border-bottom: 1px solid black;">{{$b5}}</span>  Ω
            </div>
            <div style="text-indent: 4em;">2)	校准电阻R2计算（理论值）</div>
            <div style="text-indent: 6em;margin: 5px auto;">
                ①	根据电路图，单刀开关闭合，红黑表笔接100Ω电阻，此时校准电阻计算公式为：<span style="font-size: 14px;color: gray;;">R2=[0.00015×(R1+Rg)]/[(E-0.00015×(R1+Rg))/100-0.00015] </span>
            </div>
            <div style="text-indent: 6em;margin: 5px auto;">②	代入E= <span style="color: red;text-align: center;border-bottom: 1px solid black;"> {{$b6}} </span> V,R1=  <span style="color: red;text-align: center;border-bottom: 1px solid black;">{{$b7}} </span>Ω, Rg=  <span style="color: red;text-align: center;border-bottom: 1px solid black;"> {{$b8}} </span> Ω</div>
            <div style="text-indent: 6em;margin: 5px auto;">③	计算出R2=  <span style="color: red;text-align: center;border-bottom: 1px solid black;"> {{$b9}}</span>  Ω </div>

            <h4 style="text-indent: 2em;">3.	万用表改装设计实验数据记录表<span style="color: rgb(101, 194, 248);font-size: 14px;">（每空5分，共15分，截图分值另计）</span></h4>

            <table border="1"  cellpadding="5" cellspacing="0" style="margin: 0 auto;width: 100%;">
                <tr>
                    <td rowspan="4" style="width: 46px;text-align: center;">欧姆表的改装设计</td>
                    <td style="width:78px;text-align: center;">改装要求</td>
                    <td colspan="3" style="text-align: center;">量程比率×1Ω</td>
                    <td rowspan="4" style="width:158px;height: 134px;text-align: center;">
                        <span style="font-size: 10px;" class="spc4">表头测量数据截图（4分）</span>
                        <img src={{$b13}} alt="" style="width: 150px;height: 130px;">
                    </td>
                </tr>
                <tr>
                    <td rowspan="2" style="width:78px;text-align: center;">改装计算</td>
                    <td>调零电阻R1=</td>
                    <td style="color: red;font-size: 12px;text-align: center;">{{$b10}}</td>
                    <td>Ω</td>
                </tr>
                <tr>
                    <td>校准电阻R2=</td>
                    <td style="color: red;font-size: 12px;text-align: center;">{{$b11}}</td>
                    <td>Ω</td>
                </tr>
                <tr>
                    <td style="width:78px;text-align: center;">测量电阻</td>
                    <td  style="text-align: right;">Rx=</td>
                    <td style="color: red;font-size: 12px;text-align: center;">{{$b12}}</td>
                    <td>Ω</td>
                </tr>
                <tr>
                    <td colspan="6" style="height:200px;text-align: center;">
                        <span   style="font-size: 10px;" class="spc4">实验电路设计截图（6分）</span>
                        <img src={{$b14}} alt="" style="width: 500px;">
                    </td>

                </tr>

            </table>


            <h3>七、判断题 <span style="color: rgb(101, 194, 248);font-size: 14px;">判断题 每题5分，共15分</span></h3>
            <div style="text-indent: 2em;">
                1.	微安表改装欧姆表，常用的方法是调零电阻内接法，调零电阻外接法。
            </div>
            <div style="color: red;margin: 10px 0;text-indent: 2em;">
                答案：{{$pd1}}
            </div>
            <div style="text-indent: 2em;">
                2.	在改装欧姆电表使用前,回路中电流为零,指针应指在电流表的零刻度。
            </div>
            <div style="color: red;margin: 10px 0;text-indent: 2em;">
                答案： {{$pd2}}
            </div>
            <div style="text-indent: 2em;">
                3.	在改装欧姆电表使用前,回路中电流为零,对应的电阻阻值应为∞。
            </div>
            <div style="color: red;margin: 10px 0;text-indent: 2em;">
                答案： {{$pd3}}
            </div>
    </div>
</body>
</html>
