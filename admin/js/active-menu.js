// Script untuk menandai menu yang sedang aktif
$(document).ready(function() {
    // Debug
    console.log('=== ACTIVE MENU SCRIPT LOADED ===');
    console.log('Current URL:', window.location.href);
    
    // Ambil parameter 'm' dari URL
    var urlParams = new URLSearchParams(window.location.search);
    var currentModule = urlParams.get('m');
    
    console.log('Current Module:', currentModule);
    console.log('Side menu found:', $('#side-menu').length);
    console.log('Total links:', $('#side-menu a').length);
    
    // Hapus semua class active terlebih dahulu
    $('#side-menu a').removeClass('active');
    
    // Jika ada parameter m
    if (currentModule) {
        // Cari dan tandai menu yang aktif
        var foundActive = false;
        $('#side-menu a').each(function() {
            var $link = $(this);
            var href = $link.attr('href');
            
            if (href) {
                // Cek apakah href mengandung module yang sama
                if (href.indexOf('?m=' + currentModule) !== -1 || 
                    href.indexOf('&m=' + currentModule) !== -1) {
                    $link.addClass('active');
                    foundActive = true;
                    console.log('✓ Active menu found:', href);
                    console.log('✓ Classes applied:', $link.attr('class'));
                }
            }
        });
        
        if (!foundActive) {
            console.warn('✗ No matching menu found for module:', currentModule);
        }
    } else {
        // Jika tidak ada parameter m, tandai beranda
        var $berandaLink = $('#side-menu a[href*="awal.php"]');
        if ($berandaLink.length > 0) {
            $berandaLink.first().addClass('active');
            console.log('✓ Beranda marked as active');
        }
    }
    
    // Verifikasi apakah ada yang active
    var activeCount = $('#side-menu a.active').length;
    console.log('Total active menus:', activeCount);
    
    if (activeCount > 0) {
        console.log('✓ Menu highlighting SUCCESS!');
    } else {
        console.error('✗ Menu highlighting FAILED - no active menu found!');
    }
});
