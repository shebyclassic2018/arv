$ (document).ready (function () {
  getWidthOnWindowResize ();
  setCertificateStatus ();
  forwardDocument()
});
function MOBILE_MEDIA () {
  $ ('.left-menu-m').css ('transform', 'translateX(-100%)');
}
function TABLET_MEDIA () {
  $ ('.left-menu-m').css ('transform', 'translateX(0)');
}
function DESKTOP_MEDIA () {
  $ ('.left-menu-m').css ('transform', 'translateX(0)');
}
function ALL_MEDIA () {}

function setCertificateStatus () {
  $ ('.approve-btn').click (function () {
    var cid = $ (this).val ();
    try {
      $.post (
        'js_pages/set-certificate-status.php',
        {
          cid: cid,
          status: 'Approved',
        },
        info => {
          if (info != 'Process failed') {
              alert(info);
            $ (this).fadeOut (1);
            $ ('.reject-btn').fadeIn (3000);
            location.reload ();
          }
        }
      );
    } catch (err) {
      console.error (err);
    }
  });

  $ ('.reject-btn').click (function () {
    var cid = $ (this).val ();
    try {
      $.post (
        'js_pages/set-certificate-status.php',
        {
          cid: cid,
          status: 'Rejected',
        },
        info => {
          if (info != 'Process failed') {
              alert(info)
            $ (this).fadeOut (1);
            $ ('.approve-btn').fadeIn (3000);
            location.reload ();
          }
        }
      );
    } catch (err) {
      console.error (err);
    }
  });
}


function forwardDocument() {
    $('.forward-form') . on ('submit', (e) => {
        e.preventDefault();
      
            $.ajax({
                url: 'js_pages/forward-document.php',
                type: "POST",
                data: new FormData($('.forward-form')[0]),
                cache: false,
                contentType: false,
                processData: false,
                success: (info) => {
                    alert(info)
                }
            })
        
    })
}