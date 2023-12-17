<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Main Page')</title>
    <!-- นำเข้า Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- เพิ่มรหัสสีม่วง #430F74 ในลักษณะต่าง ๆ -->
    <style>

        .navbar {
            background-color: #430F74 !important; /* สีพื้นหลังของ Navbar */
        }

        .navbar-nav .nav-link {
            color: white !important; /* สีข้อความลิงก์ */
        }

        .navbar-toggler-icon {
            background-color: white; /* สี icon ของ Navbar toggle */
        }

        /* เพิ่มสไตล์สำหรับเส้นคั่น */
        #navbarSeparator {
            height: 1px;
            background-color: white;
            margin-top: 10px;
            margin-bottom: 10px;
        }

        /* เปลี่ยนฟอนต์และสีของ "ElderWisdom" */
        .navbar-brand {
            font-family: 'Times New Roman', Times, serif; /* เลือกฟอนต์ Times New Roman */
            color: gold; /* สีทอง */
            display: flex;
            align-items: center;
        }

        .navbar-brand img {
            margin-right: 10px; /* ระยะห่างระหว่างรูปภาพกับข้อความ */
            width: 50px; /* ขนาดของรูปภาพ */
            height: 50px;
        }

        /* เพิ่มสไตล์สำหรับ h2 */
        h2 {
            font-family: 'Times New Roman', Times, serif; /* เลือกฟอนต์ Times New Roman */
            color: white; /* สีขาว */
        }
        .navbar-nav .nav-link:hover {
    border-bottom: 1px solid white; /* Adjust the color and size as needed */
}
 /* เพิ่มอนิเมชันเมื่อชี้เมาส์ที่ <li> */
 .navbar-nav li {
        position: relative;
        transition: all 0.3s ease; /* การเพิ่มอนิเมชันทั้งหมดใน 0.3 วินาที */
    }

    /* เพิ่มขีดด้านล่างเมื่อชี้เมาส์ที่ <li> */
    .navbar-nav li::before {
        content: "";
        position: absolute;
        bottom: 0;
        width: 0;
        height: 2px;
        background-color: #fff; /* สีขีด */
        transition: all 0.3s ease;
       
        transform: scaleX(0); /* เริ่มต้นด้วยขีดไม่มีความกว้าง */
    }

    /* เพิ่มขีดด้านล่างเมื่อ <li> ถูก Hover */
    .navbar-nav li:hover::before {
        width: 100%; /* ขยายขีดเต็มทั้งความยาวของ <li> */
        transform: scaleX(1); /* ขยายขีดเต็มทั้งความยาวของ <li> */
    }
    body {
        background-image: url('images/bg.png');
        background-size: cover;
  background-repeat: no-repeat;
  background-attachment: fixed; /* Center the background image */
    }
    .container {

  justify-content: center; /* Aligns horizontally */
  align-items: center; /* Aligns vertically if you also want vertical centering */
}
html, body {
  height: 80%; /* Make sure the body takes full viewport height */
}
.container.h-100 {
  height: 100%; /* Make the container take full height of the body */
}
.row.h-100 {
  min-height: 100%; /* Ensure the row takes full height of its container */
  justify-content: center; /* Center horizontally */
  align-items: center; /* Center vertically */
}
    </style>

    <!-- เลื่อนไปยังส่วนนี้ -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
    <a class="navbar-brand" href="/">
        <img src="{{ asset('images/logo.png') }}" alt="ElderWisdom Logo" class="d-inline-block align-top">
        <span style="font-size: 1.5rem;">ElderWisdom</span>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto text-center">
            <!-- Dropdown menu for New Subject -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    สร้างรายวิชาของคุณ
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="/subjects/create">New Subject</a>
                    <a class="dropdown-item" href="/videos/create">New Video</a>
                    <a class="dropdown-item" href="/videoLinkCategory/create">Tag Video</a>
                </div>
            </li>
            <!-- ... other nav items ... -->
            <li class="nav-item">
                <a class="nav-link" href="/allsubjects">รายวิชาของคุณ</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/">DashBoard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/">โปรไฟค์</a>
            </li>
        </ul>

    </div>
</nav>




    <!-- Main Content -->
    <div class="container h-100">
  <div class="row h-100 justify-content-center align-items-center">
    <main role="main" class="col-md-8" id="subjects">
    <main role="main" class="col-md-8" id="videos">
      @yield('content')
    </main>
  </div>
</div>

    <!-- นำเข้า Bootstrap JS และ Popper.js (ถ้าจำเป็น) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        // ลำดับการเรียกใช้ jQuery animate จะถูกเพิ่มไปหลังจากนี้
        $(document).ready(function(){
            // เพิ่มการเลื่อนอย่างนุ่มนวลให้กับลิงก์ทั้งหมด
            $("a").on('click', function(event) {
                // โค้ดเลื่อนนั้นอยู่ในนี้
                // ...
            });
        });
    </script>
</body>
</html>
