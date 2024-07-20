<!DOCTYPE html>

<html lang="en">
<?php
session_start();

if (!isset($_SESSION['login']) || $_SESSION['login'] !== 'true' || !isset($_SESSION['userid'])) {
    header("Location: ../index.php");
    exit();
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>aapna khalti</title>
    <link rel="stylesheet" href="../nb_files/nb_file.css">
    <link rel="stylesheet" href="index.css?<?php echo time(); ?>">
    <link rel="stylesheet" href="../nb_files/datepicker.css">
    <script src="../nb_files/datepicker.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.15.2/Sortable.min.js"></script>
    <link rel="stylesheet" href="https://nirajkumarsharma.com.np/icons/main.css" type="text/css" />
    <!-- <link rel="stylesheet" href="C:/xampp/htdocs/php/nb_fonts/main.css"> -->

</head>
<?php //DB Name:  nirajkumarsharma_personal_expance
// DB User:  nirajkumarsharma_personal_expance
// Password: f79djarZr89SWWBCxvuA ?>

<body>
    <!-- <script>
    alert("Welcome ");
    </script> -->

    <div class="wapper">
        <div class="cover">
            <div class="outer">
                <div class="main_content">
                    <div id="topnotification" class=""></div>
                    <!-- dashboard section -->
                    <div class="nb_colsection" id="dashboard_section">
                        <div class="dashboard_wapper">
                            <div class="dashboard_outer">
                                <div class="dashboard_cover">
                                    <div class="nb_row nav_bar_dashboard nb_aic nb_jcsb">
                                        <div id="imageicon"><img src="../image/IMG_7506.JPG" alt="" srcset=""></div>
                                        <div>Aapna Khalti</div>
                                        <div><i class="nb nb_bell1"></i></div>
                                    </div>
                                    <div class="nb_row aic nb_p-1" id="income_details_card">
                                        <div class="nb_sm_col_10 nb_col_4">
                                            <div class="nb_card">
                                                <p class="bank_blance">Blance </p>
                                                <p class="bankbalcmoney_rs">RS. <span id="bankbalcmoney">500</span></p>
                                                <div class="nb_row nb_aic nb_jcsb">
                                                    <p class="card_holder_name"><?php echo $_SESSION['username']; ?></p>
                                                    <p class="card_holder_date">11-01</p>
                                                </div>
                                            </div>
                                            <div class="nb_row nb_jcc nb_aic nb_my-1" id="dashboard_lower_icon">
                                                <div><button id="lower_icon_income_btn"><i
                                                            class="nb nb_book4"></i></button></div>
                                                <div><button id="lower_icon_expance_btn"><i
                                                            class="nb nb_credit-card"></i></button></div>
                                                <div><button id="lower_icon_statment_btn"><i
                                                            class="nb nb_newspaper2"></i></button></div>
                                            </div>
                                            <!-- <div class="nb_card nb_p-1">
                                                <div class="nb_row nb_aic">
                                                    <div class="nb_col_2 nb_tac"><i class="nb nb_folder-open"></i></div>
                                                    <div class="nb_col_8 nb_px-1"><span class="card_title">Bank
                                                            blance</span><br><span class="card_title_money"
                                                            id="bankbalcmoney"></span></div>
                                                </div>
                                            </div> -->
                                        </div>
                                        <!-- <div class="nb_sm_col_10 nb_col_4 nb_mb-1">
                                            <div class="nb_card nb_p-1">
                                                <div class="nb_row nb_aic">
                                                    <div class="nb_col_2 nb_tac"><i class="nb nb_library1"></i></div>
                                                    <div class="nb_col_8 nb_px-1"><span class="card_title">Creadit
                                                            Blance</span><br><span class="card_title_money"
                                                            id="incomemoney"></span></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="nb_sm_col_10 nb_col_4 nb_mb-1">
                                            <div class="nb_card nb_p-1">
                                                <div class="nb_row nb_aic">
                                                    <div class="nb_col_2 nb_tac"><i class="nb nb_book4"></i></div>
                                                    <div class="nb_col_8 nb_px-1"><span class="card_title">Debit
                                                            blance</span><br><span class="card_title_money"
                                                            id="expancemoney"></span></div>
                                                </div>
                                            </div>
                                        </div> -->

                                    </div>
                                    <!-- lend debit section -->
                                    <div class="creditdebit_section">
                                        <div class="creaditdebit_section_wapper">
                                            <div class="creaditdebit_section_outer">
                                                <div class="creaditdebit_box nb_mx-1">
                                                    <div class="nb_row aic jcc lendnavbar">
                                                        <div class="nb_col_5"><button class="lendbtnactive"
                                                                id="lendbtnbox">Lend</button></div>
                                                        <div class="nb_col_5"><button id="debitbtnbox">Debit</button>
                                                        </div>
                                                    </div>
                                                    <div id="lend_section">
                                                        <div class="lend_section_wapper">
                                                            <div class="nb_row nb_aic nb_jcc" id="lend_tablew">
                                                                <!--  -->
                                                                <!-- <div class="nb_col_9" lendid="05">
                                                                    <div class="nb_row nb_aic nb_jcsb">
                                                                        <p>Binita <sub>500</sub></p>
                                                                        <p>Rs. 2000 <sub>2080-05-07</sub></p>
                                                                    </div>
                                                                </div> -->
                                                                <!--  -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="debet_section" class="nb_hidden">
                                                        <div class="debet_section_wapper">
                                                            <div class="nb_row nb_aic nb_jcc" id="debit_table">
                                                                <!--  -->
                                                                <!-- <div class="nb_col_9">
                                                                    <div class="nb_row nb_aic nb_jcsb">
                                                                        <p>Binita <sub>clear</sub></p>
                                                                        <p>Rs. 2000 <sub>2080-05-07</sub></p>
                                                                    </div>
                                                                </div> -->
                                                                <!--  -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- lend clear form -->
                                                <div id="lend_clear_form">
                                                    <div class="lend_form_wapper">
                                                        <div class="lend_form_cover">
                                                            <form id="lend_form" method="post">
                                                                <input type="text" name="sn" id="lendideclear"
                                                                    hidden><br>
                                                                <label for="lendername">lendername : </label><span
                                                                    id="lendername">Name</span><br>
                                                                <label for="lended_amount">Lended amount :
                                                                </label><span id="lended_amount">0000</span><br>
                                                                <label for="lendstatus">Status : </label>
                                                                <span id="lendstatus">clear</span><br>

                                                                <label for="lendpaying_amount">Amount : </label><input
                                                                    type="number" id="lendpaying_amount"
                                                                    placeholder="Paying amount" min="5"><br>
                                                                <div class="nb_btn_group">
                                                                    <button class="nb_form_btn nb_cancle_btn"
                                                                        type="button"
                                                                        frmtarget="lend_clear_form">Cancle</button>
                                                                    <button class="nb_form_btn nb_submit_btn"
                                                                        type="submit" id="paylendmoney">Pay</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- debit clear form -->
                                                <div id="debet_clear_form">
                                                    <div class="debet_form_wapper">
                                                        <div class="debet_form_cover">
                                                            <form id="debet_form" method="post">
                                                                <input type="text" name="sn" id="debetideclear"
                                                                    hidden><br>
                                                                <label for="debetername">debetername : </label><span
                                                                    id="debetername">Name</span><br>
                                                                <label for="debeted_amount">debeted amount :
                                                                </label><span id="debeted_amount">000</span><br>
                                                                <label for="debetstatus">Status : </label>
                                                                <span id="debetstatus">clear</span><br>

                                                                <label for="debetpaying_amount">Amount : </label><input
                                                                    type="number" id="debetpaying_amount"
                                                                    placeholder="Paying amount" min="5"><br>
                                                                <div class="nb_btn_group">
                                                                    <button class="nb_form_btn nb_cancle_btn"
                                                                        type="button"
                                                                        frmtarget="debet_clear_form">Cancle</button>
                                                                    <button class="nb_form_btn nb_submit_btn"
                                                                        type="submit" id="debet_payamount">Pay</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- income section -->
                    <div class="nb_colsection" id="income_section">
                        <div class="income_section_wapper">
                            <div class="income_section_outer">
                                <div class="income_section_cover">
                                    <div class="section_header nb_row nb_aic nb_jcc">
                                        <p class="word">Income</p>
                                        <p class="word">Statment</p>
                                    </div>

                                    <div id="income_section_form_cover" class="income_form">
                                        <div class="income_form_outer">
                                            <form id="income_form" method="post">
                                                <label for="income_from">Sender Name : </label><input type="text"
                                                    name="income_from" id="income_from" placeholder="Sender name"
                                                    maxlength="255" required><br>
                                                <label for="income_purpose">Purpose : </label><input type="text"
                                                    name="income_purpose" id="income_purpose" maxlength="52"
                                                    placeholder="Sending Purpose" required><br>
                                                <label for="income_amount">Amount : </label><input type="number"
                                                    name="income_amount" id="income_amount" min="5" maxlength="10"
                                                    placeholder="Amount" required><br>
                                                <label for="income_post">Method : </label>
                                                <select name="income_post" required>
                                                    <option value="Bank" selected>Bank</option>
                                                    <option value="lend">lend</option>
                                                    <option value="refund">refund</option>
                                                </select>
                                                <br>
                                                <label for="income_date">Date : </label><input type="text" readonly
                                                    class="nb_nepali_cal" name="income_date" id="income_date"
                                                    placeholder="yyyy-mm-dd" required>
                                                <div class="nb_btn_group">
                                                    <button class="nb_form_btn nb_cancle_btn"
                                                        frmtarget="income_section_form_cover"
                                                        type="button">Cancle</button>
                                                    <button class="nb_form_btn nb_submit_btn"
                                                        type="submit">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div id="income_section_table" class="nb_row nb_jcse">

                                        <!-- <div class="nb_col_9">
                                            <div class="nb_row nb_jcsb nb_aic">
                                                <div class="nb_col_7">
                                                    <p class="sendername">Ramchandra sharma</p>
                                                    <p class="sending_purpose">Room rent</p>
                                                </div>
                                                <div class="nb_col_3">Rs <span class="sending_amount">3500</span><sub>
                                                        2080-05-21</sub></div>
                                            </div>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- expence section -->
                    <div class="nb_colsection" id="expence_section">
                        <div class="expance_section_wapper">
                            <div class="expance_section_cover">
                                <div class="expance_section_outer">
                                    <div class="section_header nb_row nb_aic nb_jcc">
                                        <p class="word">Expance </p>
                                        <p class="word">Statment</p>
                                    </div>
                                    <div class="nb_row nb_aic nb_p-1">
                                        <div class="nb_col_10">
                                            <div class="nb_card">
                                                <canvas id="myChart"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="expence_section_form_cover" class="expance_form nb_hidden">
                                        <div class="expancce_form_outer">
                                            <form id="expance_form" method="post">
                                                <label for="expence_things">Expance Name : </label><input type="text"
                                                    name="expence_things" id="expence_things" placeholder="Expance name"
                                                    required><br>
                                                <label for="expance_amount">Amount : </label><input type="number"
                                                    name="expance_amount" id="expance_amount"
                                                    placeholder="expance Amount" required><br>
                                                <label for="expance_place">place : </label>
                                                <select name="expance_place" id="expance_place">
                                                    <option value="room" selected>room</option>
                                                    <option value="Personal">Personal</option>
                                                    <option value="education">education</option>
                                                    <option value="debet">debet</option>
                                                    <option value="refund">refund</option>
                                                </select><br>
                                                <label for="expance_date">Date : </label><input type="text" readonly
                                                    class="nb_nepali_cal" name="expance_date" id="expance_date"
                                                    placeholder="yyyy-mm-dd" required>
                                                <div class="nb_btn_group">
                                                    <button class="nb_form_btn nb_cancle_btn"
                                                        frmtarget="expence_section_form_cover"
                                                        type="button">Cancle</button>
                                                    <button class="nb_form_btn nb_submit_btn"
                                                        type="submit">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div id="expence_section_table" class="nb_row nb_jcse">
                                        <!-- <div class="nb_col_9">
                                            <div class="nb_row nb_jcsb nb_aic">
                                                <div class="nb_col_7">
                                                    <p class="expancethingsname">Ramchandra sharma</p>
                                                    <p class="expance_place">Room</p>
                                                </div>
                                                <div class="nb_col_3">Rs <span class="spend_amount">3500</span><sub>
                                                        2080-05-21</sub></div>
                                            </div>
                                        </div> -->

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- change password section -->
                    <div class="nb_colsection" id="changepassword_section">
                        <div class="changepassword_section_wapper">
                            <div class="changepassword_section_outer">
                                <form id="changepassword_form" method="post">
                                    <label for="username">Username : </label><input type="text" name="username"
                                        id="username" placeholder="Username">
                                    <label for="newpassword">New Password :</label><input type="password"
                                        name="newpassword" id="newpassword" placeholder="New Password" required
                                        minlength="8">
                                    <label for="newpassword">Confirm Password :</label><input type="password"
                                        name="repassword" id="repassword" placeholder="Confirm Password" required
                                        minlength="8">
                                    <div class="nb_btn_group">
                                        <button class="nb_form_btn nb_submit_btn" type="submit">Change password</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- room detaling section -->
                    <div class="nb_colsection" id="roomdetaling_section">
                        <div class="roomdetaling_section_wapper">
                            <div class="roomdetaling_section_cover">
                                <div class="room_section_box">
                                    <div class="nb_row nb_jcc" id="roomrentdetailssd">
                                        <!-- <icon class="nb_arrow-up-right"></icon> -->
                                        <!-- <div class="nb_col_9" rentid="03">
                                            <div class="nb_row nb_jcsb">
                                                <p class="room_month_name"> Baishak</p>
                                                <p class="room_month_rent">Rs. 0000 <sub class=""><i
                                                            class="nb"></i><span>-200</span></sub>
                                                </p>
                                            </div>
                                        </div> -->
                                    </div>
                                </div>
                                <div id="roomdetaling_section_form_cover" class="nb_hidden">
                                    <div class="roomrentadd_form_wapper">
                                        <div class="roomrentadd_form_outer">
                                            <form id="roomrentadd_form" method="post">
                                                <label for="">Month : </label>
                                                <select name="monthrentselect" id="monthrentselect" required>
                                                    <option value="Baishakh">Baishakh</option>
                                                    <option value="Jeth">Jeth</option>
                                                    <option value="Asar">Asar</option>
                                                    <option value="Sawan">Sawan</option>
                                                    <option value="Bhadau">Bhadau</option>
                                                    <option value="Asoj">Asoj</option>
                                                    <option value="Kartik">Kartik</option>
                                                    <option value="Mangsir">Mangsir</option>
                                                    <option value="Poush">Poush</option>
                                                    <option value="Magh">Magh</option>
                                                    <option value="Falgun">Falgun</option>
                                                    <option value="Chaitra">Chaitra</option>
                                                </select><br>
                                                <label for="monthrentday">Status : </label>
                                                <select name="monthrentday" id="monthrentday" required>
                                                    <option value="Full" selected>Full</option>
                                                    <option value="Half">Half</option>
                                                </select><br>
                                                <div class="nb_btn_group">
                                                    <button class="nb_form_btn nb_cancle_btn" type="button"
                                                        frmtarget="roomdetaling_section_form_cover">Cancle</button>
                                                    <button class="nb_form_btn nb_submit_btn" type="submit">Add</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div id="roomdetaling_section_form_coverrr" class="nb_hidden">
                                    <div class="roomdetaling_section_section_form_wapper">
                                        <div class="roomdetaling_section_form_outer">
                                            <form id="monthrentforms" method="post">
                                                <input type="text" name="month_id" id="month_id" value="" hidden>
                                                <label for="Month_name_label">Month :</label><input type="text"
                                                    name="Month_name_label" id="Month_name_label" readonly value=""><br>
                                                <label for="monthrent_payment">Amount: </label><input type="number"
                                                    name="monthrent_payment" id="monthrent_payment"
                                                    placeholder="Enter Amount" required>
                                                <div class="nb_btn_group">
                                                    <button class="nb_form_btn nb_cancle_btn"
                                                        frmtarget="roomdetaling_section_form_coverrr"
                                                        type="button">Cancle</button>
                                                    <button class="nb_form_btn nb_submit_btn" type="submit">Pay</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- campus detaling section -->
                    <div class="nb_colsection active_colsection" id="campusdetaling_section">
                        <div class="campusdetailing_section_wapper">
                            <div class="section_header nb_row nb_aic nb_jcc">
                                <p class="word">Campus Bill</p>
                                <p class="word">Statment</p>
                            </div>
                            <div class="campusdetailing_section_cover">
                                <div class="campusdetailing_section_outer">
                                    <div class="nb_row nb_jcc" id="campusbill_section">

                                        <!-- <div class="nb_col_9">
                                            <div class="nb_row nb_jcsb nb_card">
                                                <p class="billdetails">Registation fee <sub class="billno">1545</sub>
                                                </p>
                                                <p class="billamount">Rs. 450 <sub class="billdate">2080-05-07</sub></p>
                                            </div>
                                        </div> -->

                                    </div>
                                    <div class="campus_bill_form_wapper" id="campusdetaling_section_form_cover">
                                        <div class="campus_bill_form_cover">
                                            <div class="campus_bill_form_outer">
                                                <form method="post" id="campusdetaling_section_form">
                                                    <label for="frmbillno">Bill no. : </label><input type="number"
                                                        name="frmbillno" id="frmbillno"
                                                        placeholder="Enter the Bill number" required><br>
                                                    <label for="frmbilldetails">Details : </label><input type="text"
                                                        name="frmbilldetails" id="frmbilldetails"
                                                        placeholder="Enter the Payment Purpose" required><br>
                                                    <label for="frmbillamt">Amount : </label><input type="number"
                                                        name="frmbillamt" id="frmbillamt" placeholder="Enter the amount"
                                                        required><br>
                                                    <div class="nb_btn_group">
                                                        <button class="nb_form_btn nb_cancle_btn" type="button"
                                                            frmtarget="campusdetaling_section_form_cover">Cancle</button>
                                                        <button class="nb_form_btn nb_submit_btn"
                                                            type="submit">Submit</button>
                                                    </div>

                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- logout section -->
                    <div class="nb_colsection" id="logoutsection_section">
                        <div class="logout_section_wapper">
                            <div class="logout_section_outer">
                                <p class="nb_header">Are you sure want to Log out ?</p>
                                <div class="nb_btn_group">
                                    <button class="nb_form_btn nb_cancle_btn">Cancle</button>
                                    <button class="nb_form_btn nb_submit_btn" id="logoutbtn">Log out</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- calculator_section -->
                    <div class="calculator_section_icon">
                        <button id="calculator_icon"><i class="nb nb_calculator"></i></button>
                    </div>
                    <div id="calculator_section_wapper">
                        <div class="calculator_section_cover">
                            <div class="calculator_section_outer">
                                <div class="calculator">
                                    <div id="screen_outer">
                                        <div id="input_screen">0</div>
                                        <div id="ans_screen"></div>
                                    </div>
                                    <div class="button_box">
                                        <table>
                                            <tr>
                                                <td class="orange">C</td>
                                                <td class="orange">/</td>
                                                <td class="orange">*</td>
                                                <td class="orange"><i class="nb nb_tag1"></i></td>
                                            </tr>
                                            <tr>
                                                <td>7</td>
                                                <td>8</td>
                                                <td>9</td>
                                                <td class="orange">-</td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>5</td>
                                                <td>6</td>
                                                <td class="orange">+</td>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>2</td>
                                                <td>3</td>
                                                <td rowspan="2" class="orange">=</td>
                                            </tr>
                                            <tr>
                                                <td>0</td>
                                                <td colspan="2">00</td>
                                            </tr>

                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- bottom button -->
                <div class="bottom_navbar" id="bottom_navbar">
                    <div class="nb_row nb_jcse nb_aic">
                        <button class="clickablebt" formtarget="false" nav_target="dashboard"><i
                                class="nb nb_home"></i></button>
                        <button class="clickablebt" formtarget="true" nav_target="income"><i
                                class="nb nb_book4"></i></button>
                        <button btnform_target=" " id="addfrombtn"><i class="nb nb_plus"></i></button>
                        <button class="clickablebt" formtarget="true" nav_target="expence"><i
                                class="nb nb_credit-card"></i></button>
                        <button id="profile_btn"><i class="nb nb_user"></i></button>
                    </div>
                </div>
                <!-- profile section -->
                <div id="profile_div_section">
                    <div class="profile_section_wapper">
                        <div class="profile_section_cover">
                            <div class="profile_section_box nb_row nb_aic">
                                <div class="nb_col_10" tarsection="roomdetaling_section" formtarget="true"><i
                                        class="nb nb_home2"></i>
                                    Room</div>
                                <div class="nb_col_10" tarsection="campusdetaling_section" formtarget="true"><i
                                        class="nb nb_library"></i>
                                    Campus</div>
                                <div class="nb_col_10" tarsection="changepassword_section" formtarget="false"><i
                                        class="nb nb_cog1"></i>
                                    Change Password</div>
                                <div class="nb_col_10" tarsection="logoutsection_section" formtarget="false"><i
                                        class="nb nb_in-alt"></i> Log out </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../nb_files/nb_file.js"></script>
    <script src="index.js?<?php echo time(); ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="dbfile.js"></script>
    <!-- <script src="chart.js"></script> -->
</body>

</html>