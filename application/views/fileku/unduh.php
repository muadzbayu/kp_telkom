<div class="row">
    <div class="col-12 col-md-4">
        <div class="card">
            <form enctype="multipart/form-data" action="<?= base_url('fileku/upload') ?>" method="post" onsubmit="return checkSize(1048576);">
                <div class="card-header">
                    <h4 class="card-title">Unggah dan Unduh Berkas</h4>
                </div>
                
                <div class="card-footer">
                	<label>Upload File Max 1 MB</label>
                    <div class="custom-file mb-3">
                        <input type="file" name="uploadedfile" class="custom-file-input" id="fileupload">
                        <label class="custom-file-label" for="uploadedfile">Pilih File</label>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block mt-2">Unggah File <i class="fa fa-save"></i></button>
                </div>
            </form>
        </div>
    </div>
    <div class="col-12 col-md-8">
        <div class="card">
                <div class="card-header">
                    <h4 class="card-title">File Tugas</h4>
                </div>
                <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <th>File Name</th>
                            <th>Upload Date</th>
                            <th>Type</th>
                            <th>Size</th>
                            <?php if ($this->session->stts == "admin"){?>
                            <th>Aksi</th>
                            <?php } ?>
                        </thead>
                        <tbody>
                        	<?php
								if($handle = opendir('./files/'))	
								{
									while(true==($file = readdir($handle)))
									{
										if($file!=="." && $file!=="..")
										{
											echo "<tr><td><a href='".base_url('fileku/download/'.urlencode($file))."'>$file</a></td>";
											echo "<td>".date("m/d/Y H:i",filemtime("files/".$file)).'</td>';
											echo "<td>.".pathinfo("files/".$file,PATHINFO_EXTENSION).'</td>';
											echo "<td>".round(filesize("files/".$file)/1024).'KB</td>';
                                            if ($this->session->stts == "admin"){
											     echo "<td><a href='".base_url('fileku/delete/' .$file)."'>Delete</a></td></tr>";
                                            }
										}
						
									}
									closedir($handle);
								}			
							?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>