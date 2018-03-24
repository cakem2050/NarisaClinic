<nav id="sideNav"><!-- MAIN MENU -->
    <ul class="nav nav-list">
        <li><!-- dashboard -->
            <a class="dashboard" href="index.php"><!-- warning - url used by default by ajax (if eneabled) -->
                <i class="main-icon fa fa-home"></i> <span>หน้าหลัก</span>
            </a>
        </li>
        <li>
            <a href="../narisaclinic/saveNewCustomer.php">
                <i class="main-icon fa fa-edit"></i> <span>บันทึกข้อมูลคนไข้</span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class="main-icon fa fa-user"></i> <span>ประวัติคนไข้</span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class="fa fa-menu-arrow pull-right"></i>
                <i class="main-icon fa fa-file"></i> <span>รายงาน</span>
            </a>
            <ul><!-- submenus -->
                <li><a href="../narisaclinic/reportInClinic.php">โอนที่ Clinic</a></li>
                <li><a href="../narisaclinic/reportOutClinic.php">โอนนอก Clinic</a></li>
                <li><a href="../narisaclinic/reportLine.php">โอน LINE@</a></li>
                <li><a href="../narisaclinic/reportCash.php">ชำระเงินสด</a></li>
                <li><a href="../narisaclinic/reportCredit.php">ชำระ credit</a></li>
                <li><a href="../narisaclinic/reportCashCredit.php">เงินสด และcredit</a></li>
                <li><a href="../narisaclinic/reportCost.php">สรุปการเงิน</a></li>
                <li><a href="../narisaclinic/reportMedicine.php">สรุปการขายยา</a></li>
            </ul>
        </li>
    </ul>
</nav>