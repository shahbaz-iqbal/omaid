<?php
$this->load->view('header');
?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>User Detail</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">User</a></li>
                    <li class="breadcrumb-item active">Detail</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-sm-12">
                <?php if ($this->session->flashdata('success')) { ?>
                    <p class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></p>
                <?php } else if ($this->session->flashdata('error')) { ?>
                    <p class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></p>
                <?php } ?>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <table id="example1" class="table table-bordered table-hover">
                    <thead>
                        <tr>             
                            <th>Name</th>
                            <th>Address</th>
                            <th>Contact No</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($data)) { ?>
                            <?php foreach ($data as $result) { ?>
                                <tr>
                                    <td><?php echo $result->id; ?></td>
                                    <td><?php echo $result->location; ?></td>
                                    <td><?php echo $result->phone; ?></td>
                                    <td>
                                        <a class="btn btn-primary btn-sm" href="#">
                                            <i class="fas fa-eye">
                                            </i>
                                            View
                                        </a>
                                        <a class="btn btn-info btn-sm" href="#" onclick="editworkplace('<?php echo $result->id; ?>')" data-toggle="modal" data-target="#exampleModal">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Edit
                                        </a>
                                        <a class="btn btn-danger btn-sm" href="<?php echo base_url('audience/delete_workplace/'); ?><?php echo $result->id; ?>">
                                            <i class="fas fa-trash-alt">
                                            </i>
                                            Delete
                                        </a>
                                    </td>
                                </tr>
                                <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('footer'); ?>