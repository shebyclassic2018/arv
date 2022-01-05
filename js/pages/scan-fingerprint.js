$(document) . ready (() => {
    var obj = new Fingerprint();
    obj.scan();
    obj.registerPatient();
})

class Fingerprint {
    constructor() {
        this.fingerprintTemplate;
        this.scan = () => {
            $('.submit-btn') . hide();
            $("#scan-fingerprint").click(() => {
                $('.submit-btn') . hide();
                $('#display').text("Place your finger on scanner.");
                $(".hbar").css("background", "red");
                this.startFingerprintAnimation();
                this.fingerPrintCapture();
            });

            $("#verify") . click (() => {
                var pid = $("#pid") . val();
                if(pid.length >= 3) {
                    if(pid.substring(0, 2) == "PT" && pid.substring(0, 3) != "PT0") {
                        this.captureToCompare();
                    } else {
                        alert("Invalid patient ID:")
                    }
                } else {
                    alert("Atleast Three (3) characters required");
                }
            }) 
        };

        this.fingerPrintCapture = () => {
            var options = {
                url: "http://localhost:8080/CallMorphoAPI?5",
                method: "POST",
                success: (result) => {
                    this.stopFingerprintAnimation();
                    if (result.ReturnCode == 0) {
                        $('#display').text("Fingerprint captured successful");
                        $(".submit-btn") .fadeIn();
                        $(".hbar").css("background", "rgb(92, 184, 92)");
                        this.fingerprintTemplate = result.Base64ISOTemplate;
                        // alert(this.fingerprintTemplate)
                        $("#fingerprinttemplate"). val(this.fingerprintTemplate);
                        this.verifyFingerPrint(this.fingerprintTemplate);
                    } else if (result.ReturnCode == -42) {
                        $('#display').text("Fingerprint device not found. Please plugin and try again");
                    } else if (result.ReturnCode == -19) {
                        $('#display').text("Fingerprint not detected. Try again");
                    } else if (result.ReturnCode == -3) {
                        $('#display').text("Fingerprint server error. Please restart and try again");
                    } else if (result.ReturnCode == -8) {
                        $('#display').text("Invalid fingerprint ");
                    } else {
                        $('#display').text("An error occurred. Try again");
                    }
                },
                error: (e) => {
                    alert("Bad API call. Try again");
                }
            };
            $.ajax(options);
        };

        this.captureToCompare = () => {
            var options = {
                url: "http://localhost:8080/CallMorphoAPI?5",
                method: "POST",
                success: (result) => {
                    this.stopFingerprintAnimation();
                    if (result.ReturnCode == 0) {
                        $('#display').text("Fingerprint captured successful");
                        $(".submit-btn") .fadeIn();
                        $(".hbar").css("background", "rgb(92, 184, 92)");
                        this.fingerprintTemplate = result.Base64ISOTemplate;
                        // $(".f").val(this.fingerprintTemplate);
                        this.verifyFingerPrint(this.fingerprintTemplate);
                    } else if (result.ReturnCode == -42) {
                        $('#display').text("Fingerprint device not found. Please plugin and try again");
                    } else if (result.ReturnCode == -19) {
                        $('#display').text("Fingerprint not detected. Try again");
                    } else if (result.ReturnCode == -3) {
                        $('#display').text("Fingerprint server error. Please restart and try again");
                    } else if (result.ReturnCode == -8) {
                        $('#display').text("Invalid fingerprint ");
                    } else {
                        $('#display').text("An error occurred. Try again");
                    }
                },
                error: (e) => {
                    alert("Bad API call. Try again");
                }
            };
            $.ajax(options);
        }

        this.compareFingerPrint = function(dbFingerPrintTemplate, pid) {
            var options = {
                url:'http://localhost:8080/CompareTemplates?'+dbFingerPrintTemplate+'$'+this.fingerprintTemplate+'$1=',
            method:'POST',
             async:true,
            crossDomain:true,
            success: function(fingerResult)
              {
              const result =fingerResult;  
              if(result.ReturnCode==0){
                if (result.MatchingResult>0) {
                    window.open("serve-patient.php?pid=" + pid, "_SELF");
                } else {
                    alert("Invalid Fingerprint detected");
                }
              }else if(result.ReturnCode==-42) {
                alert("Fingerprint device not found. Please plugin and try again");
                $('#res').removeClass().addClass('alert alert-danger fade show');
              }else if(result.ReturnCode==-3 ) {
                alert("Fingerprint server error. Please restart and try again");
                $('#res').removeClass().addClass('alert alert-danger fade show');
              }else if(result.resultCode==-19){
                alert("Fingerprint not detected. Try again");
                $('#res').removeClass().addClass('alert alert-danger fade show');
              }else if(result.ReturnCode==-8) {
                alert("Invalid fingerprint");
              }else{
                alert("An error occurred. Try again");
                $('#res').removeClass().addClass('alert alert-danger fade show');
              } 
              },
             error: function(e) 
              {
                 alert("Bad API call. Try again");
                $('#res').removeClass().addClass('alert alert-danger fade show');
                return 0;
              }          
            }

            $.ajax(options);
        };
        

        this.verifyFingerPrint = (fingerprintTemplate) => {
                var pid = $("#pid") . val();
                $.post("backend/clinician/verify-fingerprint.php", {pid: pid}, (dbFingerPrintTemplate) => {
                    if (dbFingerPrintTemplate != "No fingerprint detected") {
                        this.compareFingerPrint(dbFingerPrintTemplate, pid);
                    } else {
                        alert("User not registered!");
                    }
                })
        };

        this.startFingerprintAnimation = () => {
            $('.hbar').css({
                'animation': 'scan 3s ease-in-out infinite'
            });
        };

        this.stopFingerprintAnimation = () => {
            $('.hbar').css({
                'animation': 'stopScan 3s ease-out'
            });
        };

        this.registerPatient = () => {
            $(".patient-form") . on ('submit', (e) => {
                e.preventDefault();
                var options = {
                    url: "backend/clinician/register-patient.php",
                    method: "POST",
                    data: new FormData($(".patient-form")[0]),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success : () => {
                        window.open("register-patient.php", "_SELF");
                    },
                    error: (e) => {
                        alert(e)
                    }
                }
                $.ajax(options);
            })
        }

    }
}