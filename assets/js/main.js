var base_url = $("#base_url").val();
var key_captcha = $("#captcha").val();

$(document).ready(function () {

    setTimeout(function () {
        verifica_url();
    }, 500);


    $('.form-contato').formValidation({
        framework: 'bootstrap',
        excluded: [':disabled', ':hidden', ':not(:visible)'],
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            nome_con: {
                validators: {
                    notEmpty: {
                        message: 'Campo Nome é obrigatório.'
                    }
                }
            },
            email_con: {
                validators: {
                    notEmpty: {
                        message: 'Campo E-mail é obrigatório.'
                    },
                    emailAddress: {
                        message: 'E-mail inválido.'
                    }
                }
            },
            telefone_con: {
                validators: {
                    notEmpty: {
                        message: 'Campo Telefone é obrigatório.'
                    },
                    stringLength: {
                        min: 14,
                        max: 16,
                        message: 'Preencha o telefone corretamente.'
                    }
                }
            },
            mensagem_con: {
                validators: {
                    notEmpty: {
                        message: 'Campo Mensagem é obrigatório.'
                    },
                    stringLength: {
                        min: 5,
                        max: 400,
                        message: 'A mensagem deve ter no minimo 2 caracters e no maximo 400.'
                    }
                }
            }
        }
    }).on('success.form.fv', function (e) {
        e.preventDefault();

        var $form = $(this);
        $($form).find(".btn-enviar").addClass('btn-carregando');


        var $form = $(e.target),
            params = $form.serializeArray(),
            formData = new FormData();

        $.each(params, function (i, val) {
            formData.append(val.name, val.value);
        });
        $.ajax({
            url: $form.attr('action'),
            type: 'POST',
            data: formData,
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {

                if (data.retorno) {

                    $($form).find(".btn-enviar").removeClass('btn-carregando');
                    $(".form-contato").formValidation('resetForm', true);

                    swal.fire({
                        html: 'Seu email foi enviado com sucesso! Entraremos em contato.',
                        type: 'success',
                        confirmButtonText: 'Ok',
                        confirmButtonColor: '#FFF',
                        animation: false,
                        background: '#06E250',
                        color: '#FFF',
                        imageUrl: base_url + 'assets/imagens/geral/icn_ok.svg',
                        closeOnConfirm: true,
                        padding: '30px 10px',
                        customClass: {
                            title: 'titulo-sweet',
                            content: 'conteudo-sweet',
                            popup: 'popup-sweet',
                            confirmButton: 'botao-sweet'
                        }
                    });

                } else {
                    swal.fire({
                        html: 'Erro ao Enviar email.<br/>Verifique os dados e tente novamente!',
                        type: 'warning',
                        confirmButtonText: 'Ok',
                        confirmButtonColor: '#FFF',
                        animation: false,
                        background: '#F23B3B',
                        color: '#FFF',
                        imageUrl: base_url + 'assets/imagens/geral/icn_erro.svg',
                        closeOnConfirm: true,
                        padding: '2rem',
                        customClass: {
                            title: 'titulo-sweet',
                            content: 'conteudo-sweet',
                            popup: 'popup-sweet',
                            confirmButton: 'botao-sweet'
                        }
                    });
                    $($form).find(".btn-enviar").removeClass('btn-carregando');
                }

            },
            error: function () {
                swal.fire({
                    html: 'Erro ao Enviar email.<br/>Verifique os dados e tente novamente!',
                    type: 'warning',
                    confirmButtonText: 'Ok',
                    confirmButtonColor: '#FFF',
                    animation: false,
                    background: '#F23B3B',
                    color: '#FFF',
                    imageUrl: base_url + 'assets/imagens/geral/icn_erro.svg',
                    closeOnConfirm: true,
                    padding: '2rem',
                    customClass: {
                        title: 'titulo-sweet',
                        content: 'conteudo-sweet',
                        popup: 'popup-sweet',
                        confirmButton: 'botao-sweet'
                    }
                });
                $($form).find(".btn-enviar").removeClass('btn-carregando');
            }
        });
    });

    $(".telefone").keyup(function () {
        mascara(this, mtel);
    });

    $(".telefone-fixo").keyup(function () {
        mascara(this, mtel);
    });

    $(".maxlength").attr("maxlength", 15);

});


function verifica_url() {
    if (window.localStorage.getItem("menusolicitado")) {

        var ancora = "." + localStorage.getItem("menusolicitado");
        var posicao = localStorage.getItem("menuposicao");

        if (posicao > 0) {
            $('html, body').animate({scrollTop: $(ancora).offset().top - posicao}, 500);
        } else {
            $('html, body').animate({scrollTop: $(ancora).offset().top}, 500);
        }

        window.localStorage.clear();
    }
};

var telephoneMask = function (val) {
    return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
}, spOptions = {
    onKeyPress: function (val, e, field, options) {
        field.mask(telephoneMask.apply({}, arguments), options);
    }
};

function mascara(o, f) {
    v_obj = o;
    v_fun = f;
    setTimeout("execmascara()", 1);
}

function execmascara() {
    v_obj.value = v_fun(v_obj.value);
}

function mtel(v) {
    v = v.replace(/\D/g, "");             //Remove tudo o que não é dígito
    v = v.replace(/^(\d{2})(\d)/g, "($1) $2"); //Coloca parênteses em volta dos dois primeiros dígitos
    v = v.replace(/(\d)(\d{4})$/, "$1-$2");    //Coloca hífen entre o quarto e o quinto dígitos
    return v;
}

$.validateEmail = function (email) {
    var er = /^[a-zA-Z0-9][a-zA-Z0-9\._-]+@([a-zA-Z0-9\._-]+\.)[a-zA-Z-0-9]{2}/;
    return (er.exec(email)) ? true : false;
};

String.prototype.replaceAll = String.prototype.replaceAll || function (needle, replacement) {
    return this.split(needle).join(replacement);
};

