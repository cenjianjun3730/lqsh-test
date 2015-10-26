$(function () {
                            $( '#send' ).click( function  () {
                                var content = $( 'textarea[name=content]' );
                                var name = $( 'input[name=name]' );
                                var email = $( 'input[name=email]' );

                                if (content.val() == '') {
                                    document.getElementById('talk').style.borderColor="red";
                                    content.focus();
                                    return;
                                    } 

                                if (name.val() == '') {
                                     document.getElementById('name').style.borderColor="red";
                                     name.focus();
                                     return;
                                    }

                                if (email.val() == '') {
                                     document.getElementById('email').style.borderColor="red";
                                    email.focus();
                                     return;
                                    }

                                $.post(handleurl, {content : content.val(), name : name.val(), email : email.val()}, function (data) {
                                    if(data.status) alert(111);
                                    else alert("failes");
                                }, 'json');
                                });
                        });
