<!DOCTYPE html>
<?php
if(isset($_POST['fName']) && isset($_POST['lName']) && isset($_POST['email']) && isset($_POST['phone']) &&
isset($_POST['gender']) && isset($_POST['birthDate']) && isset($_POST['nationality']) && isset($_POST['company']) && isset($_POST['startJob']) &&
isset($_POST['endJob']) && isset($_POST['pcLang']) && isset($_POST['level']) && isset($_POST['comprehension']) && isset($_POST['reading']) &&
isset($_POST['writing'])) {
    $firstName=$_POST['fName'];
    $lastName=$_POST['lName'];
    $email=$_POST['email'];
    $phoneNumber=$_POST['phone'];

    if(isset($_POST['female'])) {
        $gender = 'Female';
    }
    else{
        $gender = 'Male';
    }
    $birth=$_POST['birthDate'];
    $nationality=$_POST['nationality'];
    $employer=$_POST['company'];
    $fromDate=$_POST['startJob'];
    $toDate=$_POST['endJob'];
    $programmingLanguage = $_POST['pcLang'];
    $levelProgramming = $_POST['level'];
    $speakingLanguages = $_POST['lang-text'];
    $comprehension = $_POST['comprehension'];
    $reading = $_POST['reading'];
    $writing = $_POST['writing'];

    $bCategory = ' ';
    $aCategory = ' ';
    $cCategory = ' ';
    if(isset($_POST['bLicense'])) {
        $bCategory .= 'B';
    }
    if(isset($_POST['aLicense'])) {
        $aCategory .= 'A';
    }
    if(isset($_POST['cLicense'])) {
        $cCategory .= 'C';
    }
    if(!preg_match('/[^0-9\+\-\s]/', $phoneNumber) && !preg_match('/[^A-Za-z]/', $firstName) && !preg_match('/[^A-Za-z]/', $lastName)
            && !preg_match('/[^A-Za-z0-9 ]/', $employer) && strlen($firstName) <= 20 && strlen($firstName) >= 2 &&
            strlen($lastName) <= 20 && strlen($lastName) >= 2 && strlen($employer) <= 20 && strlen($employer) >= 2) {

        $personalData=
            '<table border=1px><thead><tr><th colspan="2">Personal Information</th></tr></thead><tbody>' .
            '<tr><td>First Name</td><td>' . $firstName . '</td></tr><td>Last Name</td><td>' . $lastName  . '</td></tr>' .
            '<tr><td>Email</td><td>' . $email . '</td></tr>' .
            '<tr><td>Phone</td><td>' . $phoneNumber . '</td></tr>' .
            '<tr><td>Gender</td><td>' . $gender . '</td></tr>' .
            '<tr><td>Birth Date</td><td>' . $birth . '</td></tr>' .
            '<tr><td>Nationality</td><td>' . $nationality . '</td></tr></tbody></table>';
        $workTable =
            '<table><thead><tr><th colspan="2">Last Work Position</th></tr></thead><tbody>' .
            '<tr><td>Company Name</td><td>' . $employer . '</td></tr>' .
            '<tr><td>From</td><td>' . $fromDate . '</td></tr>' .
            '<tr><td>To</td><td>' . $toDate . '</td></tr></tbody></table>';
        $computerSkillsTable =
            '<table><thead><tr><th colspan="2">Computer Skills</th></tr></thead><tbody>' .
            '<tr><td>Programming Languages</td><td><table><thead><tr><th>Language</th><th>Skill Level</th></tr></thead>' .
            '<tbody>';
        for($i = 0; $i < count($levelProgramming) ;$i++) {
            $computerSkillsTable .= '<tr>';
            $computerSkillsTable .= '<td>' . $programmingLanguage[$i] . '</td>';
            $computerSkillsTable .= '<td>' . $levelProgramming[$i] . '</td>';
            $computerSkillsTable .= '</tr>';

        }
        $computerSkillsTable .= '</tbody></table></tr></tbody></table>';
        $otherSkills = '<table><thead><tr><th colspan="2">Other Skills</th></tr></thead><tbody>' .
            '<tr><td>Languages</td><td><table><thead><th>Language</th><th>Comprehension</th>' .
            '<th>Reading</th><th>Writing</th></tr>';
        for($i = 0; $i < count($comprehension) ;$i++) {
            $otherSkills .= '<tr>';
            $otherSkills .= '<td>' . $speakingLanguages[$i] . '</td>';
            $otherSkills .= '<td>' . $comprehension[$i] . '</td>';
            $otherSkills .= '<td>' . $reading[$i] . '</td>';
            $otherSkills .= '<td>' . $writing[$i] . '</td>';
        }
        $otherSkills .= '</tbody></table></tr><tr><td>Driver`s License</td><td>' . $bCategory . " ".  $aCategory. " " . $cCategory .'</td></tr>';
        $otherSkills .= '</tbody></table>';
    }
}
?>
<html>
<head>
    <title>CV Generator</title>
    <style>
        #inputData{
            border: 2px solid red;
            width: 650px;
            float: left;
            margin-left: 10px;
        }
        #outputData{
            border:2px solid green;
            width: 600px;
            float: right;
            margin-right: 10px;
        }
        #inputData, #outputData{
            display: table-cell;

            padding: 10px;

        }
        #personalData, #job, #pcSkills,  #otherSkills{
            width: 580px;
        }
        table {
            border:1px solid black;
            margin-bottom:10px;
        }
        th, td {
            border:1px solid black;
            padding:5px;
        }
        td{
            width: 200px;
        }

    </style>
    <script>
        var idCounter = 0;
        function addProgLang() {
            var myDiv = document.createElement("div");
            myDiv.setAttribute("id", "inputBox" + idCounter);
            idCounter++;
            myDiv.innerHTML = '<input type="text" name="pcLang[]" id="pcLang" required="true"/>' +
                '<select name="level[]" id="level" required="true">' +
                '<option value="Beginner">Beginner</option>' +
                '<option value="Intermediate">Intermediate</option>' +
                '<option value="Advanced">Advanced</option>' +
                '</select>' +
                '<br/>';
            document.getElementById("parent-pcLang").appendChild(myDiv);
        }
        function removeProgLang() {
            var getChild = document.getElementById("parent-pcLang").lastChild;
            if(getChild.id != "inputBox0") {
                document.getElementById("parent-pcLang").removeChild(getChild);
            }
        }
        var idLangCounter = 0;
        function addLang() {
            var langParent = document.getElementById("parent-languages");
            var newDiv = document.createElement("div");
            newDiv.setAttribute("id", "lang" + idLangCounter);
            idLangCounter++;
            newDiv.innerHTML = '<input type="text" id="lang" name="language-text[]" required="true"/>' +
                '<select name="comprehension[]" id="comprehension" required="true">'+
                '<option value="default" disabled selected>-Comprehension-</option>' +
                '<option value="beginner">Beginner</option>' +
                '<option value="intermediate">Intermediate</option>' +
                '<option value="advanced">Advanced</option>' +
                '</select>' +
                '<select name="reading[]" id="reading" required="true">' +
                '<option value="default" disabled selected>-Reading-</option>' +
                '<option value="beginner">Beginner</option>' +
                '<option value="intermediate">Intermediate</option>' +
                '<option value="advanced">Advanced</option>' +
                ' </select>' +
                ' <select name="writing[]" id="writing">' +
                '<option value="default" disabled selected required="true">-Writing-</option>' +
                ' <option value="beginner">Beginner</option>' +
                '<option value="intermediate">Intermediate</option>'+
                '<option value="advanced">Advanced</option>'+
                '</select>'+
                ' <br/>';

            langParent.appendChild(newDiv);
        }
        function removeLang() {
            var getChild = document.getElementById("parent-languages").lastChild;
            if(getChild.id != "inputBox0") {
                document.getElementById("parent-languages").removeChild(getChild);
            }
        }
    </script>
</head>
<body>
<section id="inputData">
    <form method="post" action="05CVGenerator.php">
    <fieldset id="personalData">
        <legend>Personal Information</legend>
        <input type="text" name="fName" placeholder="First Name"><br>
        <input type="text" name="lName" placeholder="Last Name"><br>
        <input type="email" name="email" placeholder="Email"><br>
        <input type="tel" name="phone" placeholder="Phone Number"><br>
        <label for="female">Female</label>
        <input type="radio" name="gender" id="female">
        <label for="male">Male</label>
        <input type="radio" name="gender" id="male"><br>
        <label for="birthDate">Birth Date</label><br>
        <input type="date" name="birthDate" placeholder="dd/mm/yyyy"><br>
        <label for="nationality">Nationality</label><br>
        <select name="nationality" id="nationality">
        <option value="BG">Bulgarian</option>
        <option value="UK">UK</option>
        <option value="USA">USA</option>
        <option value="Germany">Germany</option>
        </select>
    </fieldset>

    <fieldset id="job">
        <legend>Last Work Position</legend>
        Company Name <input type="text" name="company"><br>
        From <input type="date" name="startJob" placeholder="dd/mm/yyyy"><br>
        To <input type="date" name="endJob" placeholder="dd/mm/yyyy"><br>
    </fieldset>

    <fieldset id="pcSkills">
        <legend>Computer Skills</legend>
        <label for="pcLang">Programming Languages</label><br>
        <div id="parent-pcLang">

        </div>
        <script> addProgLang();</script>
        <button type="button" value="delLang" id="delLang" onclick="removeProgLang()">Remove Language</button>
        <button type="button" value="addLang" id="addLang" onclick="addProgLang()">Add Language</button>
    </fieldset>

    <fieldset id="otherSkills">
        <legend>Other Skills</legend>
        <label for="lang">Languages</label>
        <div id="parent-languages">

        </div>
        <script>addLang();</script>
        <button type="button" value="delLang" id="delLang" onclick="removeLang()">Remove Language</button>
        <button type="button" value="addLang" id="addLang" onclick="addLang()">Add Language</button><br>
        Driver License<br>
        <label for="bLicense">B</label>
        <input type="checkbox" name="bLicense" id="bLicense">
        <label for="aLicense">A</label>
        <input type="checkbox" name="aLicense" id="aLicense">
        <label for="cLicense">C</label>
        <input type="checkbox" name="cLicense" id="cLicense">
    </fieldset><br>
    <input type="submit" name="submit" placeholder="Generate CV" style="width: 200px; background:cadetblue">
    </form>
</section>
<section id="outputData">
    <?php
    echo $personalData;
    echo $workTable;
    echo $computerSkillsTable ;
    echo $otherSkills;
    ?>
</section>
</body>
</html>