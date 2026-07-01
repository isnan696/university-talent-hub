<?php $__env->startSection('title', 'Dashboard Mahasiswa'); ?>
<?php $__env->startSection('content'); ?>
<?php if($dashboard): ?>

<div class="row g-3 mb-4">
    <div class="col-sm-6 col-lg-3">
        <div class="stat-card">
            <div>
                <p class="stat-label">Total Skill</p>
                <div class="stat-value"><?php echo e($dashboard['skills_count']); ?></div>
            </div>
            <div class="stat-icon blue"><i class="bi bi-code-slash"></i></div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="stat-card">
            <div>
                <p class="stat-label">Sertifikat</p>
                <div class="stat-value"><?php echo e($dashboard['certificates_count']); ?></div>
            </div>
            <div class="stat-icon mint"><i class="bi bi-patch-check-fill"></i></div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="stat-card">
            <div>
                <p class="stat-label">Portfolio</p>
                <div class="stat-value"><?php echo e($dashboard['portfolios_count']); ?></div>
            </div>
            <div class="stat-icon amber"><i class="bi bi-folder-fill"></i></div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="stat-card">
            <div>
                <p class="stat-label">Total Poin</p>
                <div class="stat-value"><?php echo e($dashboard['points']?->total_points ?? 0); ?></div>
            </div>
            <div class="stat-icon rose"><i class="bi bi-star-fill"></i></div>
        </div>
    </div>
</div>


<div class="row g-4">
    
    <div class="col-lg-8">
        
        <?php if($dashboard['profile']): ?>
        <div class="card mb-4">
            <div class="card-body" style="padding:22px;">
                <div class="d-flex align-items-center gap-3 flex-wrap">
                    <?php if($dashboard['profile']->photo): ?>
                    <img src="<?php echo e(asset('storage/'.$dashboard['profile']->photo)); ?>" class="avatar" style="width:66px;height:66px;">
                    <?php else: ?>
                    <div class="avatar-initial lg"><?php echo e(strtoupper(substr(auth()->user()->name, 0, 2))); ?></div>
                    <?php endif; ?>
                    <div class="flex-grow-1">
                        <h5 class="mb-1 fw-bold" style="font-size:20px;"><?php echo e(auth()->user()->name); ?></h5>
                        <p class="text-muted mb-2" style="font-size:14px;">
                            <?php echo e($dashboard['profile']->program_studi ?? '-'); ?> — <?php echo e($dashboard['profile']->nim ?? '-'); ?>

                        </p>
                        <div class="progress-custom">
                            <div class="progress-fill" style="width:<?php echo e($dashboard['profile']->profile_completion); ?>%;"></div>
                        </div>
                    </div>
                    <span class="badge <?php echo e($dashboard['profile']->profile_completion >= 80 ? 'badge-approved' : 'badge-pending'); ?>" style="align-self:flex-start;">
                        <?php echo e($dashboard['profile']->profile_completion); ?>% lengkap
                    </span>
                </div>
            </div>
        </div>

        
        <?php if($dashboard['pending_count'] > 0): ?>
        <div class="alert alert-warning d-flex align-items-center gap-2 py-3 mb-4">
            <i class="bi bi-clock-history" style="font-size:1.1rem;"></i>
            <span><strong><?php echo e($dashboard['pending_count']); ?></strong> data menunggu verifikasi admin</span>
        </div>
        <?php endif; ?>

        
        <div class="card mb-4">
            <div class="card-header bg-transparent border-0 pt-3 px-4 d-flex align-items-center justify-content-between">
                <h6 class="fw-bold mb-0"><i class="bi bi-stars me-2" style="color:var(--primary);"></i>Rekomendasi AI</h6>
                <span class="text-muted" style="font-size:12px;">Rule-based engine</span>
            </div>
            <div class="card-body pt-2 px-4 pb-4">
                <?php $__empty_1 = true; $__currentLoopData = $dashboard['recommendations']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rec): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="recommendation-card">
                    <h6><?php echo e($rec->title); ?></h6>
                    <p><?php echo e($rec->description); ?></p>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="text-center py-4">
                    <i class="bi bi-lightbulb" style="font-size:2rem;color:var(--orange);"></i>
                    <p class="text-muted mt-2 mb-0">Belum ada rekomendasi. Tambahkan lebih banyak skill dan sertifikat untuk mendapatkan saran.</p>
                </div>
                <?php endif; ?>
            </div>
        </div>
        <?php else: ?>
        
        <div class="card mb-4">
            <div class="card-body text-center py-5">
                <div class="avatar-initial lg mx-auto mb-3" style="opacity:.6;">
                    <i class="bi bi-person-plus"></i>
                </div>
                <h5 class="fw-bold">Lengkapi Profil Anda</h5>
                <p class="text-muted mb-3">Buat profil terlebih dahulu untuk melihat dashboard lengkap, rekomendasi AI, dan peringkat Anda.</p>
                <a href="<?php echo e(route('student.profile.edit')); ?>" class="btn btn-primary px-4">
                    <i class="bi bi-pencil-square me-2"></i>Lengkapi Profil
                </a>
            </div>
        </div>
        <?php endif; ?>
    </div>

    
    <div class="col-lg-4">
        
        <div class="card mb-4">
            <div class="card-header bg-transparent border-0 pt-3 px-4 d-flex align-items-center justify-content-between">
                <h6 class="fw-bold mb-0"><i class="bi bi-trophy-fill me-2" style="color:var(--orange);"></i>Peringkat</h6>
                <?php if($dashboard['ranking']): ?>
                <span class="badge badge-approved">#<?php echo e($dashboard['ranking']); ?> Kampus</span>
                <?php endif; ?>
            </div>
            <div class="card-body pt-1 px-4 pb-4">
                <?php if($dashboard['ranking']): ?>
                <div class="text-center py-3">
                    <div style="font-size:48px;font-weight:800;color:var(--primary);line-height:1;">#<?php echo e($dashboard['ranking']); ?></div>
                    <p class="text-muted mt-2 mb-0" style="font-size:13px;">dari semua mahasiswa</p>
                </div>

                
                <?php if(isset($dashboard['top_students']) && count($dashboard['top_students']) > 0): ?>
                <div class="mt-2">
                    <?php $__currentLoopData = $dashboard['top_students']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="leader-row">
                        <div class="rank-badge <?php echo e($index < 2 ? 'top' : ''); ?>"><?php echo e($index + 1); ?></div>
                        <div>
                            <div style="font-weight:600;font-size:14px;"><?php echo e($student->name ?? 'Mahasiswa'); ?></div>
                        </div>
                        <strong style="font-size:14px;"><?php echo e($student->total_points ?? 0); ?></strong>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <?php endif; ?>
                <?php else: ?>
                <div class="text-center py-4">
                    <i class="bi bi-trophy" style="font-size:2.5rem;color:var(--line);"></i>
                    <p class="text-muted mt-2 mb-0" style="font-size:13px;">Kumpulkan poin untuk naik peringkat.</p>
                </div>
                <?php endif; ?>
            </div>
        </div>

        
        <div class="card">
            <div class="card-header bg-transparent border-0 pt-3 px-4">
                <h6 class="fw-bold mb-0"><i class="bi bi-clock-history me-2" style="color:var(--cyan);"></i>Aktivitas Terbaru</h6>
            </div>
            <div class="card-body pt-2 px-4 pb-4">
                <?php if(isset($dashboard['recent_activities']) && count($dashboard['recent_activities']) > 0): ?>
                    <?php $__currentLoopData = $dashboard['recent_activities']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $activity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="activity-item">
                        <div>
                            <h6><?php echo e($activity->name ?? $activity->title ?? 'Aktivitas'); ?></h6>
                            <p><?php echo e($activity->type ?? 'Update'); ?></p>
                        </div>
                        <span class="badge badge-<?php echo e($activity->verification_status ?? 'pending'); ?>">
                            <?php echo e(ucfirst($activity->verification_status ?? 'pending')); ?>

                        </span>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    
                    <?php if($dashboard['skills_count'] > 0): ?>
                    <div class="activity-item">
                        <div>
                            <h6><?php echo e($dashboard['skills_count']); ?> Skill Terdaftar</h6>
                            <p>Skill yang sudah ditambahkan</p>
                        </div>
                        <span class="badge badge-approved"><i class="bi bi-code-slash"></i></span>
                    </div>
                    <?php endif; ?>
                    <?php if($dashboard['certificates_count'] > 0): ?>
                    <div class="activity-item">
                        <div>
                            <h6><?php echo e($dashboard['certificates_count']); ?> Sertifikat</h6>
                            <p>Sertifikat yang diunggah</p>
                        </div>
                        <span class="badge badge-approved"><i class="bi bi-patch-check"></i></span>
                    </div>
                    <?php endif; ?>
                    <?php if($dashboard['portfolios_count'] > 0): ?>
                    <div class="activity-item">
                        <div>
                            <h6><?php echo e($dashboard['portfolios_count']); ?> Portfolio</h6>
                            <p>Portfolio yang dibuat</p>
                        </div>
                        <span class="badge badge-pending"><i class="bi bi-folder"></i></span>
                    </div>
                    <?php endif; ?>
                    <?php if($dashboard['skills_count'] == 0 && $dashboard['certificates_count'] == 0 && $dashboard['portfolios_count'] == 0): ?>
                    <div class="text-center py-3">
                        <i class="bi bi-journal-text" style="font-size:2rem;color:var(--line);"></i>
                        <p class="text-muted mt-2 mb-0" style="font-size:13px;">Belum ada aktivitas. Mulai tambahkan skill atau sertifikat!</p>
                    </div>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php else: ?>

<div class="card">
    <div class="card-body text-center py-5">
        <div class="avatar-initial lg mx-auto mb-3" style="opacity:.6;">
            <i class="bi bi-person-plus"></i>
        </div>
        <h5 class="fw-bold">Selamat Datang!</h5>
        <p class="text-muted mb-3">Lengkapi profil Anda terlebih dahulu untuk mulai menggunakan platform.</p>
        <a href="<?php echo e(route('student.profile.edit')); ?>" class="btn btn-primary px-4">
            <i class="bi bi-pencil-square me-2"></i>Lengkapi Profil
        </a>
    </div>
</div>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Isnan\Study Case Lomba TOPRANK\University Talent Hub\resources\views/student/dashboard.blade.php ENDPATH**/ ?>