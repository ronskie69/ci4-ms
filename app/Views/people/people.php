<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>
 <h1>People</h1>
 <button id="btn-add">New Person</button>
 <br><br>
 <?php if(session()->has('success')) { ?>
    <div class="alert alert-success">
        <?=(session()->get('success'))?>
    </div>
 <?php } ?>
 <?php if(session()->has('error')) { ?>
    <div class="alert alert-error">
        <?=(session()->get('error'))?>
    </div>
 <?php } ?>
 <table class="table">
    <thead>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Age</th>
            <th>Address</th>
            <th>Gender</th>
            <th>Salary</th>
            <th width="10%"></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($people as $person): ?>
            <tr>
                <td><?=$person['fname']?></td>
                <td><?=$person['lname']?></td>
                <td><?=$person['age']?></td>
                <td><?=$person['address']?></td>
                <td><?=$person['gender']?></td>
                <td><?=$person['salary']?></td>
                <td>
                    <button>Edit</button>
                    <button onclick="confirm('Are you sure to delete <?=$person['fname'].' '.$person['lname']?>?') && window.location.replace('<?=base_url('/people/deletePerson/'.$person['p_id'])?>')">Delete</button>
                </td>
            </tr>
        <?php endforeach;?>
    </tbody>
 </table>


 <!-- MODAL -->
  <div class="modal hidden">
    <div class="modal-overlay">
        <div class="modal-content">
            <form action="<?=base_url('/people/addPerson')?>" class="form" method="POST">
                <label for="">First Name:</label><br>
                <input type="fname" name="fname" class="fname input" id="fname"><br>
                <label for="">Last Name:</label><br>
                <input type="lname" name="lname" class="lname input" id="lname"><br>
                <label for="">Address:</label><br>
                <input type="address" name="address" class="address input" id="address"><br>
                <label>
                    <input type="radio" name="gender" class="gender input" value="Male">
                    Male
                </label>
                <label>
                    <input type="radio" name="gender" class="gender input" value="Female">
                    Female
                </label>
                <br>
                <label for="">Age:</label><br>
                <input type="number" name="age" class="age input" id="age"><br>
                <label for="">Salary:</label><br>
                <input type="number" name="salary" class="salary input" id="salary"><br>
                <br><br>
                <input type="submit" value="Save" class="btn">
                <a href="<?=base_url('/people')?>"><button type="button">Cancel</button></a>
            </form>
        </div>
    </div>
  </div>
  <script>
    document.getElementById('btn-add').addEventListener('click', function(e){
        e.preventDefault()
        document.querySelector('.modal').classList.toggle('hidden')
    })
  </script>
<?= $this->endSection()?>