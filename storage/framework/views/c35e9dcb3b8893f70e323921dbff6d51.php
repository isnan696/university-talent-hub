<?php $__env->startSection('title', 'Edit Profil'); ?>
<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header bg-white border-0 pt-3 px-4">
        <h5 class="fw-bold mb-0">Profil Saya</h5>
    </div>
    <div class="card-body px-4 pb-4">
        <div class="row">
            <div class="col-md-3 text-center mb-4">
                <?php if($profile?->photo): ?>
                <img src="<?php echo e(asset('storage/'.$profile->photo)); ?>" class="rounded-circle mb-3" style="width:120px;height:120px;object-fit:cover;">
                <?php else: ?>
                <div class="avatar-initial mx-auto mb-3" style="width:120px;height:120px;font-size:3rem;"><?php echo e(substr(auth()->user()->name,0,1)); ?></div>
                <?php endif; ?>
                <form action="<?php echo e(route('student.profile.photo')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <input type="file" name="photo" class="form-control form-control-sm mb-2" accept="image/*" onchange="this.form.submit()">
                    <small class="text-secondary">Max 5MB (JPG/PNG)</small>
                </form>
            </div>
            <div class="col-md-9">
                <form method="POST" action="<?php echo e(route('student.profile.update')); ?>">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold" style="font-size:0.9rem;">Nama</label>
                            <input type="text" class="form-control" value="<?php echo e(auth()->user()->name); ?>" disabled>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold" style="font-size:0.9rem;">Email</label>
                            <input type="email" class="form-control" value="<?php echo e(auth()->user()->email); ?>" disabled>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold" style="font-size:0.9rem;">NIM</label>
                            <input type="text" class="form-control" value="<?php echo e($profile?->nim); ?>" disabled>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold" style="font-size:0.9rem;">Program Studi</label>
                            <input type="text" class="form-control" value="<?php echo e($profile?->program_studi); ?>" disabled>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold" style="font-size:0.9rem;">Angkatan</label>
                            <input type="text" class="form-control" value="<?php echo e($profile?->angkatan); ?>" disabled>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold" style="font-size:0.9rem;">No. Telepon</label>
                            <input type="text" name="phone" class="form-control" value="<?php echo e(old('phone', $profile?->phone)); ?>" placeholder="08123456789">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold" style="font-size:0.9rem;">GitHub URL</label>
                            <input type="url" name="github_url" class="form-control" value="<?php echo e(old('github_url', $profile?->github_url)); ?>" placeholder="https://github.com/username">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold" style="font-size:0.9rem;">LinkedIn URL</label>
                            <input type="url" name="linkedin_url" class="form-control" value="<?php echo e(old('linkedin_url', $profile?->linkedin_url)); ?>" placeholder="https://linkedin.com/in/username">
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold" style="font-size:0.9rem;">Bio</label>
                            <textarea name="bio" class="form-control" rows="3" placeholder="Tulis bio singkat..."><?php echo e(old('bio', $profile?->bio)); ?></textarea>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Isnan\Study Case Lomba TOPRANK\University Talent Hub\resources\views/student/profile/edit.blade.php ENDPATH**/ ?>