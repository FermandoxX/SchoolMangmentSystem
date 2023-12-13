<head>
<link rel="stylesheet" href='/SchoolMangmentSystem/Css/Admin/index.css'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" charset="utf-8"></script>
</head>
<div class="leftbody">
<div>    
<img src="/SchoolMangmentSystem/Image/<?= $UserData[0]['image'] ?>" class="PersonImage2">
<p style="font-weight:bold"><?= $UserData[0]['name'] ?></p>
</div>
<div class="navigator" style="align-items: baseline;">
<p>Navigator</p>
<a class="dashboard" href="#" style="margin-right: 45px;"> <i class="fas fa-chart-pie"></i>Dashboard</a>
<a class="user" style="cursor:pointer;"><i class='fas fa-user-alt userqwe'></i>User<i class="fa-solid fa-angle-right dropdown" style="font-size: small; cursor:pointer;"></i></a>
<div class="sub_user" style="display: none;">
                <a href="/SchoolMangmentSystem/index.php/Users/Admin" class="Admin">Admin</a>
                <a href='/SchoolMangmentSystem/index.php/Users/Teacher' class="Teacher">Teacher</a>
                <a href="/SchoolMangmentSystem/index.php/Users/Student" class="Student">Student</a>
                <a href='/SchoolMangmentSystem/index.php/Users/Parents' class="Parents">Parents</a>
</div>
<a class="academic" style="cursor:pointer;"><i class='fas fa-building'></i>Academic<i class="fa-solid fa-angle-right dropdown" style="font-size: small;  cursor:pointer;"></i></a>
<div class="sub_academic" style="display: none;">
            <a href="#" class="Subject">Subject</a>
</div>
<a class="exam" style="cursor:pointer;"><i class='fas fa-book-open'></i>Exam<i class="fa-solid fa-angle-right dropdown" style="font-size: small;  cursor:pointer;"></i></a>
<div class="sub_exam" style="display: none;">
            <a href="#" class="Marks">Marks</a>
            <a href="#" class="Exams">Exams</a>
            <a href="#" class="Grades">Grades</a>
</div>
<a class="accounting" style="cursor:pointer;"><i class='fas fa-briefcase'></i>Accounting<i class="fa-solid fa-angle-right dropdown" style="font-size: small;  cursor:pointer;"></i></a>
<div class="sub_accounting" style="display: none;">
            <a href="#" class="Student_Fee_Manager">Student Fee Manager</a>
</div>
</div>
</div>