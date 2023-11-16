'use strict'

window.validateTraitorRegisterForm = function () {
    return {
        name: '',
        email: '',
        password: '',
        company: '',
        contact: '',
        city: '',
        postal: '',
        validation: {
            company, name: {
                rule: {
                    required: function (field) {
                        if (field) {
                            return { error: false, message: '' }
                        } else {
                            return { error: true, message: 'Ce champ est requis.' }
                        }
                    },
                    minLength: function (field, value = 2) {
                        if (field && field.length >= value) {
                            return { error: false, message: '' }
                        } else {
                            return { error: true, message: `Ce champ doit contenir ${value} caractères minimun.` }
                        }
                    },
                    maxLength: function (field, value = 255) {
                        if (field && field.length <= value) {
                            return { error: false, message: '' }
                        } else {
                            return { error: true, message: `Ce champ doit contenir ${value} caractères maximun.` }
                        }
                    }
                },
                error: true,
                message: ''
            },

            city: {
                rule: {
                    required: function (field) {
                        if (field) {
                            return { error: false, message: '' }
                        } else {
                            return { error: true, message: 'Ce champ est requis.' }
                        }
                    },
                    number: function (field) {
                        const rgx = /(^[0-9])/
                        if (!rgx.test(field)) {
                            return { error: false, message: '' }
                        } else {
                            return { error: true, message: 'Format du nom de la ville incorrect.' }
                        }
                    },
                    minLength: function (field, value = 2) {
                        if (field && field.length >= value) {
                            return { error: false, message: '' }
                        } else {
                            return { error: true, message: `Ce champ doit contenir ${value} caractères minimun.` }
                        }
                    },
                    maxLength: function (field, value = 255) {
                        if (field && field.length <= value) {
                            return { error: false, message: '' }
                        } else {
                            return { error: true, message: `Ce champ doit contenir ${value} caractères maximun.` }
                        }
                    }
                },
                error: true,
                message: ''
            },

            postal: {
                rule: {
                    required: function (field) {
                        if (field) {
                            return { error: false, message: '' }
                        } else {
                            return { error: true, message: 'Ce champ est requis.' }
                        }
                    },
                    maxLength: function (field, value = 5) {
                        if (field && field.length <= value) {
                            return { error: false, message: '' }
                        } else {
                            return { error: true, message: `Ce champ doit contenir ${value} caractères maximun.` }
                        }
                    },
                    number: function (field) {
                        const rgx = /(^[0-9])/
                        if (rgx.test(field)) {
                            return { error: false, message: '' }
                        } else {
                            return { error: true, message: 'Format du code incorrect.' }
                        }
                    }
                },
                error: true,
                message: ''
            },
            contact: {
                rule: {
                    required: function (field) {
                        if (field) {
                            return { error: false, message: '' }
                        } else {
                            return { error: true, message: 'Ce champ est requis.' }
                        }
                    },
                    maxLength: function (field, value = 18) {
                        if (field.length <= value) {
                            return { error: false, message: '' }
                        } else {
                            return { error: true, message: `Ce champ doit contenir ${value} caractères maximun.` }
                        }
                    },
                    tel: function (field) {
                        if (preg_match("#^0[1-68]([-. ]?[0-9]{2}){4}$#", field)) {
                            return { error: false, message: '' }
                        } else {
                            return { error: true, message: 'Format de contact incorrect.' }
                        }
                    }
                },
                error: true,
                message: ''
            },
            email: {
                rule: {
                    required: function (field) {
                        if (field) {
                            return { error: false, message: '' }
                        } else {
                            return { error: true, message: 'Ce champ est requis.' }
                        }
                    },
                    email: function (field) {
                        const rgx = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
                        if (rgx.test(field)) {
                            return { error: false, message: '' }
                        } else {
                            return { error: true, message: 'Format d\'adresse mail incorrect.' }
                        }
                    }
                },
                error: true,
                message: ''
            },
            password: {
                rule: {
                    required: function (field) {
                        if (field) {
                            return { error: false, message: '' }
                        } else {
                            return { error: true, message: 'Ce champ est requis.' }
                        }
                    },
                    minLength: function (field, value = 8) {
                        if (field && field.length >= value) {
                            return { error: false, message: '' }
                        } else {
                            return { error: true, message: `Ce champ doit contenir ${value} caractères minimun.` }
                        }
                    }
                },
                error: true,
                message: ''
            }
        },
        validate(field) {
            for (const key in this.validation[field].rule) {
                const validationResult = this.validation[field].rule[key](this[field])
                if (validationResult.error) {
                    this.validation[field].error = true
                    this.validation[field].message = validationResult.message
                    break
                }
                this.validation[field].error = false
                this.validation[field].message = ''
                continue
            }
        }
    }
}
window.validateAdminRegisterForm = function () {
    return {
        name: '',
        email: '',
        password: '',
        validation: {
            name: {
                rule: {
                    required: function (field) {
                        if (field) {
                            return { error: false, message: '' }
                        } else {
                            return { error: true, message: 'Ce champ est requis.' }
                        }
                    },
                    minLength: function (field, value = 2) {
                        if (field && field.length >= value) {
                            return { error: false, message: '' }
                        } else {
                            return { error: true, message: `Ce champ doit contenir ${value} caractères minimun.` }
                        }
                    },
                    maxLength: function (field, value = 255) {
                        if (field && field.length <= value) {
                            return { error: false, message: '' }
                        } else {
                            return { error: true, message: `Ce champ doit contenir ${value} caractères maximun.` }
                        }
                    }
                },
                error: true,
                message: ''
            },
            email: {
                rule: {
                    required: function (field) {
                        if (field) {
                            return { error: false, message: '' }
                        } else {
                            return { error: true, message: 'Ce champ est requis.' }
                        }
                    },
                    email: function (field) {
                        const rgx = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
                        if (rgx.test(field)) {
                            return { error: false, message: '' }
                        } else {
                            return { error: true, message: 'Format d\'adresse mail incorrect.' }
                        }
                    }
                },
                error: true,
                message: ''
            },
            password: {
                rule: {
                    required: function (field) {
                        if (field) {
                            return { error: false, message: '' }
                        } else {
                            return { error: true, message: 'Ce champ est requis.' }
                        }
                    },
                    minLength: function (field, value = 8) {
                        if (field && field.length >= value) {
                            return { error: false, message: '' }
                        } else {
                            return { error: true, message: `Ce champ doit contenir ${value} caractères minimun.` }
                        }
                    }
                },
                error: true,
                message: ''
            }
        },
        validate(field) {
            for (const key in this.validation[field].rule) {
                const validationResult = this.validation[field].rule[key](this[field])
                if (validationResult.error) {
                    this.validation[field].error = true
                    this.validation[field].message = validationResult.message
                    break
                }
                this.validation[field].error = false
                this.validation[field].message = ''
                continue
            }
        }
    }
}
window.validateLoginForm = function () {
    return {
        email: '',
        password: '',
        validation: {
            email: {
                rule: {
                    required: function (field) {
                        if (field) {
                            return { error: false, message: '' }
                        } else {
                            return { error: true, message: 'Ce champ est requis.' }
                        }
                    },
                    email: function (field) {
                        const rgx = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
                        if (rgx.test(field)) {
                            return { error: false, message: '' }
                        } else {
                            return { error: true, message: 'Format d\'adresse mail incorrect.' }
                        }
                    }
                },
                error: true,
                message: ''
            },
            password: {
                rule: {
                    required: function (field) {
                        if (field) {
                            return { error: false, message: '' }
                        } else {
                            return { error: true, message: 'Ce champ est requis.' }
                        }
                    },
                    minLength: function (field, value = 8) {
                        if (field && field.length >= value) {
                            return { error: false, message: '' }
                        } else {
                            return { error: true, message: `Ce champ doit contenir ${value} caractères minimun.` }
                        }
                    }
                },
                error: true,
                message: ''
            }
        },
        validate(field) {
            for (const key in this.validation[field].rule) {
                const validationResult = this.validation[field].rule[key](this[field])
                if (validationResult.error) {
                    this.validation[field].error = true
                    this.validation[field].message = validationResult.message
                    break
                }
                this.validation[field].error = false
                this.validation[field].message = ''
                continue
            }
        }
    }
}
window.validateContactForm = function () {
    return {
        name: '',
        email: '',
        object: '',
        message: '',
        validation: {
            name: {
                rule: {
                    required: function (field) {
                        if (field) {
                            return { error: false, message: '' }
                        } else {
                            return { error: true, message: 'Ce champ est requis.' }
                        }
                    },
                    minLength: function (field, value = 2) {
                        if (field && field.length >= value) {
                            return { error: false, message: '' }
                        } else {
                            return { error: true, message: `Ce champ doit contenir ${value} caractères minimun.` }
                        }
                    },
                    maxLength: function (field, value = 255) {
                        if (field && field.length <= value) {
                            return { error: false, message: '' }
                        } else {
                            return { error: true, message: `Ce champ doit contenir ${value} caractères maximun.` }
                        }
                    }
                },
                error: true,
                message: ''
            },
            email: {
                rule: {
                    required: function (field) {
                        if (field) {
                            return { error: false, message: '' }
                        } else {
                            return { error: true, message: 'Ce champ est requis.' }
                        }
                    },
                    email: function (field) {
                        const rgx = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
                        if (rgx.test(field)) {
                            return { error: false, message: '' }
                        } else {
                            return { error: true, message: 'Format d\'adresse mail incorrect.' }
                        }
                    }
                },
                error: true,
                message: ''
            },
            message: {
                rule: {
                    required: function (field) {
                        if (field) {
                            return { error: false, message: '' }
                        } else {
                            return { error: true, message: 'Ce champ est requis.' }
                        }
                    },
                    minLength: function (field, value = 10) {
                        if (field && field.length >= value) {
                            return { error: false, message: '' }
                        } else {
                            return { error: true, message: `Ce champ doit contenir ${value} caractères minimun.` }
                        }
                    }
                },
                error: true,
                message: ''
            },
            object: {
                rule: {
                    required: function (field) {
                        if (field) {
                            return { error: false, message: '' }
                        } else {
                            return { error: true, message: 'Ce champ est requis.' }
                        }
                    },
                    minLength: function (field, value = 2) {
                        if (field && field.length >= value) {
                            return { error: false, message: '' }
                        } else {
                            return { error: true, message: `Ce champ doit contenir ${value} caractères minimun.` }
                        }
                    },
                    maxLength: function (field, value = 50) {
                        if (field && field.length <= value) {
                            return { error: false, message: '' }
                        } else {
                            return { error: true, message: `Ce champ doit contenir ${value} caractères maximum.` }
                        }
                    }
                },
                error: true,
                message: ''
            }
        },
        validate(field) {
            for (const key in this.validation[field].rule) {
                const validationResult = this.validation[field].rule[key](this[field])
                if (validationResult.error) {
                    this.validation[field].error = true
                    this.validation[field].message = validationResult.message
                    break
                }
                this.validation[field].error = false
                this.validation[field].message = ''
                continue
            }
        }
    }
}