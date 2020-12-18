(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[2],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/principal/TeacherFormModal.vue?vue&type=script&lang=js&":
/*!*************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/principal/TeacherFormModal.vue?vue&type=script&lang=js& ***!
  \*************************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
/* harmony default export */ __webpack_exports__["default"] = ({
  name: 'TeacherFormModal',
  props: {
    teacherForm: Object,
    editMode: Boolean
  },
  data: function data() {
    return {
      form: new Form()
    };
  },
  beforeMount: function beforeMount() {
    this.form = this.teacherForm;
  },
  methods: {
    addTeacher: function addTeacher() {
      var _this = this;

      this.$Progress.start();
      this.form.post('/principal/api/users').then(function () {
        _this.$emit('reload-teachers');

        $('#teacher-form-modal').modal('hide');
        Toast.fire({
          icon: 'success',
          title: 'Teacher added'
        });

        _this.$Progress.finish();

        _this.form.reset();

        _this.form.clear();
      })["catch"](function () {
        return _this.$Progress.fail();
      });
    },
    updateTeacher: function updateTeacher() {
      var _this2 = this;

      this.$Progress.start();
      this.form.put("/principal/api/users/".concat(this.form.id)).then(function () {
        _this2.$emit('reload-teachers');

        $('#teacher-form-modal').modal('hide');
        Toast.fire({
          icon: 'success',
          title: 'Teacher updated'
        });

        _this2.$Progress.finish();

        _this2.form.reset();

        _this2.form.clear();
      })["catch"](function () {
        return _this2.$Progress.fail();
      });
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/principal/TeacherInfoModal.vue?vue&type=script&lang=js&":
/*!*************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/principal/TeacherInfoModal.vue?vue&type=script&lang=js& ***!
  \*************************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
/* harmony default export */ __webpack_exports__["default"] = ({
  name: 'TeacherInfoModal',
  props: {
    teacher: Object
  },
  methods: {
    address: function address(teacher) {
      return teacher.purok + ', ' + teacher.barangay + ', ' + teacher.city + ', ' + teacher.province;
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/pages/principal/Teacher.vue?vue&type=script&lang=js&":
/*!***********************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/pages/principal/Teacher.vue?vue&type=script&lang=js& ***!
  \***********************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var lodash__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! lodash */ "./node_modules/lodash/lodash.js");
/* harmony import */ var lodash__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(lodash__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _components_principal_TeacherFormModal__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../components/principal/TeacherFormModal */ "./resources/js/components/principal/TeacherFormModal.vue");
/* harmony import */ var _components_principal_TeacherInfoModal__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../components/principal/TeacherInfoModal */ "./resources/js/components/principal/TeacherInfoModal.vue");
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//



/* harmony default export */ __webpack_exports__["default"] = ({
  name: 'Teacher',
  components: {
    TeacherFormModal: _components_principal_TeacherFormModal__WEBPACK_IMPORTED_MODULE_1__["default"],
    TeacherInfoModal: _components_principal_TeacherInfoModal__WEBPACK_IMPORTED_MODULE_2__["default"]
  },
  data: function data() {
    return {
      loadingText: 'Loading...',
      editMode: false,
      teacher_query: '',
      teachers: {},
      teacher: {},
      form: new Form({
        id: '',
        role_id: 5,
        first_name: '',
        middle_name: '',
        last_name: '',
        suffix: '',
        sex: '',
        birthdate: '',
        contact_number: '',
        specialization: '',
        citizenship: '',
        religion: '',
        purok: '',
        barangay: '',
        city: '',
        province: ''
      })
    };
  },
  created: function created() {
    var _this = this;

    this.$Progress.start();
    this.loadTeachers();
    this.$on('reload-teachers', function () {
      return _this.loadTeachers();
    });
  },
  mounted: function mounted() {
    this.searchTeachers = lodash__WEBPACK_IMPORTED_MODULE_0___default.a.debounce(this.searchTeachers, 300);
  },
  methods: {
    loadTeachers: function loadTeachers() {
      var _this2 = this;

      var page = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : 1;
      this.loadingText = 'Loading...';
      axios.get("/principal/api/users/teachers?page=".concat(page)).then(function (response) {
        _this2.teachers = response.data;
        _this2.loadingText = 'No data';

        _this2.$Progress.finish();
      })["catch"](function () {
        _this2.$Progress.fail();

        _this2.loadingText = 'No data';
      });
    },
    searchTeachers: function searchTeachers() {
      var _this3 = this;

      if (this.teacher_query) {
        this.loadingText = 'Loading...';
        axios.get("/principal/api/users/teachers/search?query=".concat(this.teacher_query)).then(function (response) {
          _this3.teachers = response.data;
          _this3.loadingText = 'No data';
        })["catch"](function () {
          return _this3.loadingText = 'No data';
        });
      } else {
        this.loadTeachers();
      }
    },
    deleteTeacher: function deleteTeacher(id) {
      var _this4 = this;

      Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then(function (result) {
        if (result.value) {
          _this4.$Progress.start();

          axios["delete"]("/principal/api/users/".concat(id)).then(function () {
            Swal.fire('Deleted!', 'Teacher is deleted.', 'success');

            _this4.$emit('reload-teachers');

            _this4.$Progress.finish();
          })["catch"](function () {
            _this4.$Progress.fail();

            Swal.fire({
              icon: 'error',
              title: 'Failed',
              text: 'Something went wrong!'
            });
          });
        }
      });
    },
    showAddTeacherModal: function showAddTeacherModal() {
      this.editMode = false;
      this.form.reset();
      this.form.clear();
      $('#teacher-form-modal').modal('show');
    },
    showEditTeacherModal: function showEditTeacherModal(teacher) {
      this.editMode = true;
      this.form.reset();
      this.form.clear();
      this.form.fill(teacher);
      $('#teacher-form-modal').modal('show');
    },
    showTeacherInfoModal: function showTeacherInfoModal(teacher) {
      this.teacher = teacher;
      $('#teacher-info-modal').modal('show');
    }
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/principal/TeacherFormModal.vue?vue&type=template&id=b27b6e1a&":
/*!*****************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/principal/TeacherFormModal.vue?vue&type=template&id=b27b6e1a& ***!
  \*****************************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    { staticClass: "modal fade", attrs: { id: "teacher-form-modal" } },
    [
      _c("div", { staticClass: "modal-dialog modal-lg" }, [
        _c("div", { staticClass: "modal-content" }, [
          _c("div", { staticClass: "modal-header bg-gradient-purple" }, [
            _c("img", {
              attrs: {
                src: "/images/app/apple-touch-icon.png",
                alt: "LVA Logo",
                height: "50",
                width: "50"
              }
            }),
            _vm._v("  \n                "),
            _vm.editMode
              ? _c("h4", { staticClass: "p-2" }, [_vm._v("Edit Teacher")])
              : _c("h4", { staticClass: "p-2" }, [_vm._v("Add Teacher")]),
            _vm._v(" "),
            _vm._m(0)
          ]),
          _vm._v(" "),
          _c(
            "form",
            {
              attrs: { autocomplete: "off" },
              on: {
                submit: function($event) {
                  $event.preventDefault()
                  _vm.editMode ? _vm.updateTeacher() : _vm.addTeacher()
                },
                keydown: function($event) {
                  return _vm.form.onKeydown($event)
                }
              }
            },
            [
              _c("div", { staticClass: "modal-body" }, [
                _vm._m(1),
                _vm._v(" "),
                _c("div", { staticClass: "row" }, [
                  _c("div", { staticClass: "col-md-3" }, [
                    _c(
                      "div",
                      { staticClass: "form-group" },
                      [
                        _vm._m(2),
                        _vm._v(" "),
                        _c("input", {
                          directives: [
                            {
                              name: "model",
                              rawName: "v-model",
                              value: _vm.form.first_name,
                              expression: "form.first_name"
                            }
                          ],
                          staticClass: "form-control",
                          class: {
                            "is-invalid": _vm.form.errors.has("first_name")
                          },
                          attrs: { type: "text", placeholder: "e.g. John" },
                          domProps: { value: _vm.form.first_name },
                          on: {
                            input: function($event) {
                              if ($event.target.composing) {
                                return
                              }
                              _vm.$set(
                                _vm.form,
                                "first_name",
                                $event.target.value
                              )
                            }
                          }
                        }),
                        _vm._v(" "),
                        _c("has-error", {
                          attrs: { form: _vm.form, field: "first_name" }
                        })
                      ],
                      1
                    )
                  ]),
                  _vm._v(" "),
                  _c("div", { staticClass: "col-md-3" }, [
                    _c(
                      "div",
                      { staticClass: "form-group" },
                      [
                        _vm._m(3),
                        _vm._v(" "),
                        _c("input", {
                          directives: [
                            {
                              name: "model",
                              rawName: "v-model",
                              value: _vm.form.middle_name,
                              expression: "form.middle_name"
                            }
                          ],
                          staticClass: "form-control",
                          class: {
                            "is-invalid": _vm.form.errors.has("middle_name")
                          },
                          attrs: {
                            type: "text",
                            placeholder: "e.g. Macapagal"
                          },
                          domProps: { value: _vm.form.middle_name },
                          on: {
                            input: function($event) {
                              if ($event.target.composing) {
                                return
                              }
                              _vm.$set(
                                _vm.form,
                                "middle_name",
                                $event.target.value
                              )
                            }
                          }
                        }),
                        _vm._v(" "),
                        _c("has-error", {
                          attrs: { form: _vm.form, field: "middle_name" }
                        })
                      ],
                      1
                    )
                  ]),
                  _vm._v(" "),
                  _c("div", { staticClass: "col-md-3" }, [
                    _c(
                      "div",
                      { staticClass: "form-group" },
                      [
                        _vm._m(4),
                        _vm._v(" "),
                        _c("input", {
                          directives: [
                            {
                              name: "model",
                              rawName: "v-model",
                              value: _vm.form.last_name,
                              expression: "form.last_name"
                            }
                          ],
                          staticClass: "form-control",
                          class: {
                            "is-invalid": _vm.form.errors.has("last_name")
                          },
                          attrs: {
                            type: "text",
                            placeholder: "e.g. Dela Cruz"
                          },
                          domProps: { value: _vm.form.last_name },
                          on: {
                            input: function($event) {
                              if ($event.target.composing) {
                                return
                              }
                              _vm.$set(
                                _vm.form,
                                "last_name",
                                $event.target.value
                              )
                            }
                          }
                        }),
                        _vm._v(" "),
                        _c("has-error", {
                          attrs: { form: _vm.form, field: "last_name" }
                        })
                      ],
                      1
                    )
                  ]),
                  _vm._v(" "),
                  _c("div", { staticClass: "col-md-3" }, [
                    _c(
                      "div",
                      { staticClass: "form-group" },
                      [
                        _vm._m(5),
                        _vm._v(" "),
                        _c("input", {
                          directives: [
                            {
                              name: "model",
                              rawName: "v-model",
                              value: _vm.form.suffix,
                              expression: "form.suffix"
                            }
                          ],
                          staticClass: "form-control",
                          class: {
                            "is-invalid": _vm.form.errors.has("suffix")
                          },
                          attrs: { type: "text", placeholder: "e.g. Jr" },
                          domProps: { value: _vm.form.suffix },
                          on: {
                            input: function($event) {
                              if ($event.target.composing) {
                                return
                              }
                              _vm.$set(_vm.form, "suffix", $event.target.value)
                            }
                          }
                        }),
                        _vm._v(" "),
                        _c("has-error", {
                          attrs: { form: _vm.form, field: "suffix" }
                        })
                      ],
                      1
                    )
                  ])
                ]),
                _vm._v(" "),
                _c("div", { staticClass: "row" }, [
                  _c("div", { staticClass: "col-md-3" }, [
                    _c(
                      "div",
                      { staticClass: "form-group" },
                      [
                        _vm._m(6),
                        _vm._v(" "),
                        _c(
                          "select",
                          {
                            directives: [
                              {
                                name: "model",
                                rawName: "v-model",
                                value: _vm.form.sex,
                                expression: "form.sex"
                              }
                            ],
                            staticClass: "form-control",
                            class: { "is-invalid": _vm.form.errors.has("sex") },
                            on: {
                              change: function($event) {
                                var $$selectedVal = Array.prototype.filter
                                  .call($event.target.options, function(o) {
                                    return o.selected
                                  })
                                  .map(function(o) {
                                    var val = "_value" in o ? o._value : o.value
                                    return val
                                  })
                                _vm.$set(
                                  _vm.form,
                                  "sex",
                                  $event.target.multiple
                                    ? $$selectedVal
                                    : $$selectedVal[0]
                                )
                              }
                            }
                          },
                          [
                            _c("option", { attrs: { value: "" } }, [
                              _vm._v("Select gender...")
                            ]),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "M" } }, [
                              _vm._v("Male")
                            ]),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "F" } }, [
                              _vm._v("Female")
                            ])
                          ]
                        ),
                        _vm._v(" "),
                        _c("has-error", {
                          attrs: { form: _vm.form, field: "sex" }
                        })
                      ],
                      1
                    )
                  ]),
                  _vm._v(" "),
                  _c("div", { staticClass: "col-md-3" }, [
                    _c(
                      "div",
                      { staticClass: "form-group" },
                      [
                        _vm._m(7),
                        _vm._v(" "),
                        _c("input", {
                          directives: [
                            {
                              name: "model",
                              rawName: "v-model",
                              value: _vm.form.birthdate,
                              expression: "form.birthdate"
                            }
                          ],
                          staticClass: "form-control",
                          class: {
                            "is-invalid": _vm.form.errors.has("birthdate")
                          },
                          attrs: { type: "date" },
                          domProps: { value: _vm.form.birthdate },
                          on: {
                            input: function($event) {
                              if ($event.target.composing) {
                                return
                              }
                              _vm.$set(
                                _vm.form,
                                "birthdate",
                                $event.target.value
                              )
                            }
                          }
                        }),
                        _vm._v(" "),
                        _c("has-error", {
                          attrs: { form: _vm.form, field: "birthdate" }
                        })
                      ],
                      1
                    )
                  ]),
                  _vm._v(" "),
                  _c("div", { staticClass: "col-md-3" }, [
                    _c(
                      "div",
                      { staticClass: "form-group" },
                      [
                        _vm._m(8),
                        _vm._v(" "),
                        _c("input", {
                          directives: [
                            {
                              name: "model",
                              rawName: "v-model",
                              value: _vm.form.specialization,
                              expression: "form.specialization"
                            }
                          ],
                          staticClass: "form-control",
                          class: {
                            "is-invalid": _vm.form.errors.has("specialization")
                          },
                          attrs: { type: "text", placeholder: "e.g. Biology" },
                          domProps: { value: _vm.form.specialization },
                          on: {
                            input: function($event) {
                              if ($event.target.composing) {
                                return
                              }
                              _vm.$set(
                                _vm.form,
                                "specialization",
                                $event.target.value
                              )
                            }
                          }
                        }),
                        _vm._v(" "),
                        _c("has-error", {
                          attrs: { form: _vm.form, field: "specialization" }
                        })
                      ],
                      1
                    )
                  ]),
                  _vm._v(" "),
                  _c("div", { staticClass: "col-md-3" }, [
                    _c(
                      "div",
                      { staticClass: "form-group" },
                      [
                        _vm._m(9),
                        _vm._v(" "),
                        _c("input", {
                          directives: [
                            {
                              name: "model",
                              rawName: "v-model",
                              value: _vm.form.contact_number,
                              expression: "form.contact_number"
                            }
                          ],
                          staticClass: "form-control",
                          class: {
                            "is-invalid": _vm.form.errors.has("contact_number")
                          },
                          attrs: {
                            type: "tel",
                            placeholder: "e.g. 09123456789",
                            pattern: "[0-9]{4}[0-9]{3}[0-9]{4}",
                            maxlength: "11"
                          },
                          domProps: { value: _vm.form.contact_number },
                          on: {
                            input: function($event) {
                              if ($event.target.composing) {
                                return
                              }
                              _vm.$set(
                                _vm.form,
                                "contact_number",
                                $event.target.value
                              )
                            }
                          }
                        }),
                        _vm._v(" "),
                        _c("has-error", {
                          attrs: { form: _vm.form, field: "contact_number" }
                        })
                      ],
                      1
                    )
                  ])
                ]),
                _vm._v(" "),
                _c("div", { staticClass: "row" }, [
                  _c("div", { staticClass: "col-md-6" }, [
                    _c(
                      "div",
                      { staticClass: "form-group" },
                      [
                        _vm._m(10),
                        _vm._v(" "),
                        _c("input", {
                          directives: [
                            {
                              name: "model",
                              rawName: "v-model",
                              value: _vm.form.citizenship,
                              expression: "form.citizenship"
                            }
                          ],
                          staticClass: "form-control",
                          class: {
                            "is-invalid": _vm.form.errors.has("citizenship")
                          },
                          attrs: { type: "text", placeholder: "e.g. Filipino" },
                          domProps: { value: _vm.form.citizenship },
                          on: {
                            input: function($event) {
                              if ($event.target.composing) {
                                return
                              }
                              _vm.$set(
                                _vm.form,
                                "citizenship",
                                $event.target.value
                              )
                            }
                          }
                        }),
                        _vm._v(" "),
                        _c("has-error", {
                          attrs: { form: _vm.form, field: "citizenship" }
                        })
                      ],
                      1
                    )
                  ]),
                  _vm._v(" "),
                  _c("div", { staticClass: "col-md-6" }, [
                    _c(
                      "div",
                      { staticClass: "form-group" },
                      [
                        _vm._m(11),
                        _vm._v(" "),
                        _c("input", {
                          directives: [
                            {
                              name: "model",
                              rawName: "v-model",
                              value: _vm.form.religion,
                              expression: "form.religion"
                            }
                          ],
                          staticClass: "form-control",
                          class: {
                            "is-invalid": _vm.form.errors.has("religion")
                          },
                          attrs: {
                            type: "text",
                            placeholder:
                              "e.g. Seventh-day Adventist, Roman Catholic, etc."
                          },
                          domProps: { value: _vm.form.religion },
                          on: {
                            input: function($event) {
                              if ($event.target.composing) {
                                return
                              }
                              _vm.$set(
                                _vm.form,
                                "religion",
                                $event.target.value
                              )
                            }
                          }
                        }),
                        _vm._v(" "),
                        _c("has-error", {
                          attrs: { form: _vm.form, field: "religion" }
                        })
                      ],
                      1
                    )
                  ])
                ]),
                _vm._v(" "),
                _c("br"),
                _vm._v(" "),
                _vm._m(12),
                _vm._v(" "),
                _c("div", { staticClass: "row" }, [
                  _c("div", { staticClass: "col-md-3" }, [
                    _c(
                      "div",
                      { staticClass: "form-group" },
                      [
                        _vm._m(13),
                        _vm._v(" "),
                        _c("input", {
                          directives: [
                            {
                              name: "model",
                              rawName: "v-model",
                              value: _vm.form.purok,
                              expression: "form.purok"
                            }
                          ],
                          staticClass: "form-control",
                          class: { "is-invalid": _vm.form.errors.has("purok") },
                          attrs: { type: "text", placeholder: "e.g. Purok 1" },
                          domProps: { value: _vm.form.purok },
                          on: {
                            input: function($event) {
                              if ($event.target.composing) {
                                return
                              }
                              _vm.$set(_vm.form, "purok", $event.target.value)
                            }
                          }
                        }),
                        _vm._v(" "),
                        _c("has-error", {
                          attrs: { form: _vm.form, field: "purok" }
                        })
                      ],
                      1
                    )
                  ]),
                  _vm._v(" "),
                  _c("div", { staticClass: "col-md-3" }, [
                    _c(
                      "div",
                      { staticClass: "form-group" },
                      [
                        _vm._m(14),
                        _vm._v(" "),
                        _c("input", {
                          directives: [
                            {
                              name: "model",
                              rawName: "v-model",
                              value: _vm.form.barangay,
                              expression: "form.barangay"
                            }
                          ],
                          staticClass: "form-control",
                          class: {
                            "is-invalid": _vm.form.errors.has("barangay")
                          },
                          attrs: {
                            type: "text",
                            placeholder: "e.g. Poblacion"
                          },
                          domProps: { value: _vm.form.barangay },
                          on: {
                            input: function($event) {
                              if ($event.target.composing) {
                                return
                              }
                              _vm.$set(
                                _vm.form,
                                "barangay",
                                $event.target.value
                              )
                            }
                          }
                        }),
                        _vm._v(" "),
                        _c("has-error", {
                          attrs: { form: _vm.form, field: "barangay" }
                        })
                      ],
                      1
                    )
                  ]),
                  _vm._v(" "),
                  _c("div", { staticClass: "col-md-3" }, [
                    _c(
                      "div",
                      { staticClass: "form-group" },
                      [
                        _vm._m(15),
                        _vm._v(" "),
                        _c("input", {
                          directives: [
                            {
                              name: "model",
                              rawName: "v-model",
                              value: _vm.form.city,
                              expression: "form.city"
                            }
                          ],
                          staticClass: "form-control",
                          class: { "is-invalid": _vm.form.errors.has("city") },
                          attrs: {
                            type: "text",
                            placeholder: "e.g. Don Carlos"
                          },
                          domProps: { value: _vm.form.city },
                          on: {
                            input: function($event) {
                              if ($event.target.composing) {
                                return
                              }
                              _vm.$set(_vm.form, "city", $event.target.value)
                            }
                          }
                        }),
                        _vm._v(" "),
                        _c("has-error", {
                          attrs: { form: _vm.form, field: "city" }
                        })
                      ],
                      1
                    )
                  ]),
                  _vm._v(" "),
                  _c("div", { staticClass: "col-md-3" }, [
                    _c(
                      "div",
                      { staticClass: "form-group" },
                      [
                        _vm._m(16),
                        _vm._v(" "),
                        _c("input", {
                          directives: [
                            {
                              name: "model",
                              rawName: "v-model",
                              value: _vm.form.province,
                              expression: "form.province"
                            }
                          ],
                          staticClass: "form-control",
                          class: {
                            "is-invalid": _vm.form.errors.has("province")
                          },
                          attrs: { type: "text", placeholder: "e.g. Bukidnon" },
                          domProps: { value: _vm.form.province },
                          on: {
                            input: function($event) {
                              if ($event.target.composing) {
                                return
                              }
                              _vm.$set(
                                _vm.form,
                                "province",
                                $event.target.value
                              )
                            }
                          }
                        }),
                        _vm._v(" "),
                        _c("has-error", {
                          attrs: { form: _vm.form, field: "province" }
                        })
                      ],
                      1
                    )
                  ])
                ])
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "modal-footer" }, [
                _c(
                  "button",
                  {
                    staticClass: "btn btn-default",
                    attrs: { type: "button", "data-dismiss": "modal" }
                  },
                  [_vm._v("Cancel")]
                ),
                _vm._v(" "),
                _vm.editMode
                  ? _c(
                      "button",
                      {
                        staticClass: "btn btn-success",
                        attrs: { type: "submit" }
                      },
                      [_vm._v("Save changes")]
                    )
                  : _c(
                      "button",
                      {
                        staticClass: "btn btn-success",
                        attrs: { type: "submit" }
                      },
                      [_vm._v("Submit")]
                    )
              ])
            ]
          )
        ])
      ])
    ]
  )
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "button",
      {
        staticClass: "close",
        attrs: {
          type: "button",
          "data-dismiss": "modal",
          "aria-label": "Close"
        }
      },
      [_c("span", { attrs: { "aria-hidden": "true" } }, [_vm._v("×")])]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "row" }, [
      _c("h5", [
        _c("i", { staticClass: "fas fa-user-alt" }),
        _vm._v(" "),
        _c("b", [_vm._v("Biodata")])
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", [
      _vm._v(
        "\n                                    First Name\n                                    "
      ),
      _c("sup", [_c("i", { staticClass: "fas fa-star-of-life text-danger" })])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", [
      _vm._v(
        "\n                                    Middle Name\n                                    "
      ),
      _c("small", { staticClass: "text-info" }, [
        _c("em", [_vm._v("(optional)")])
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", [
      _vm._v(
        "\n                                    Last Name\n                                    "
      ),
      _c("sup", [_c("i", { staticClass: "fas fa-star-of-life text-danger" })])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", [
      _vm._v(
        "\n                                    Suffix\n                                    "
      ),
      _c("small", { staticClass: "text-info" }, [
        _c("em", [_vm._v("(optional)")])
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", [
      _vm._v(
        "\n                                    Gender\n                                    "
      ),
      _c("sup", [_c("i", { staticClass: "fas fa-star-of-life text-danger" })])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", [
      _vm._v(
        "\n                                    Birthdate\n                                    "
      ),
      _c("sup", [_c("i", { staticClass: "fas fa-star-of-life text-danger" })])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", [
      _vm._v(
        "\n                                    Specialization\n                                    "
      ),
      _c("sup", [_c("i", { staticClass: "fas fa-star-of-life text-danger" })])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", [
      _vm._v(
        "\n                                    Contact Number\n                                    "
      ),
      _c("sup", [_c("i", { staticClass: "fas fa-star-of-life text-danger" })])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", [
      _vm._v(
        "\n                                    Citizenship\n                                    "
      ),
      _c("sup", [_c("i", { staticClass: "fas fa-star-of-life text-danger" })])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", [
      _vm._v(
        "\n                                    Religion\n                                    "
      ),
      _c("sup", [_c("i", { staticClass: "fas fa-star-of-life text-danger" })])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "row" }, [
      _c("h5", [
        _c("i", { staticClass: "fas fa-map-marked" }),
        _vm._v(" "),
        _c("b", [_vm._v("Address")])
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", [
      _vm._v(
        "\n                                    Purok/Street\n                                    "
      ),
      _c("sup", [_c("i", { staticClass: "fas fa-star-of-life text-danger" })])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", [
      _vm._v(
        "\n                                    Barangay\n                                    "
      ),
      _c("sup", [_c("i", { staticClass: "fas fa-star-of-life text-danger" })])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", [
      _vm._v(
        "\n                                    City/Municipality\n                                    "
      ),
      _c("sup", [_c("i", { staticClass: "fas fa-star-of-life text-danger" })])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", [
      _vm._v(
        "\n                                    Province\n                                    "
      ),
      _c("sup", [_c("i", { staticClass: "fas fa-star-of-life text-danger" })])
    ])
  }
]
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/principal/TeacherInfoModal.vue?vue&type=template&id=58743849&":
/*!*****************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/principal/TeacherInfoModal.vue?vue&type=template&id=58743849& ***!
  \*****************************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    { staticClass: "modal fade", attrs: { id: "teacher-info-modal" } },
    [
      _c("div", { staticClass: "modal-dialog modal-lg" }, [
        _c("div", { staticClass: "card card-purple card-outline" }, [
          _c("div", { staticClass: "card-body box-profile" }, [
            _vm._m(0),
            _vm._v(" "),
            _c("div", { staticClass: "text-center" }, [
              _vm.teacher.sex == "M"
                ? _c("img", {
                    staticClass: "profile-user-img img-fluid img-circle",
                    attrs: {
                      alt: "User Profile",
                      src: "/images/app/avatar5.png"
                    }
                  })
                : _c("img", {
                    staticClass: "profile-user-img img-fluid img-circle",
                    attrs: {
                      alt: "User Profile",
                      src: "/images/app/avatar3.png"
                    }
                  }),
              _vm._v(" "),
              _c("h3", { staticClass: "profile-username text-center" }, [
                _vm._v(_vm._s(_vm.teacher.full_name))
              ]),
              _vm._v(" "),
              _c(
                "ul",
                { staticClass: "list-group list-group-unbordered mb-3" },
                [
                  _c("li", { staticClass: "list-group-item" }, [
                    _c("b", { staticClass: "float-left" }, [_vm._v("Gender")]),
                    _vm._v(" "),
                    _vm.teacher.sex == "M"
                      ? _c("a", { staticClass: "float-right" }, [
                          _vm._v("Male")
                        ])
                      : _c("a", { staticClass: "float-right" }, [
                          _vm._v("Female")
                        ])
                  ]),
                  _vm._v(" "),
                  _c("li", { staticClass: "list-group-item" }, [
                    _c("b", { staticClass: "float-left" }, [
                      _vm._v("Birthdate")
                    ]),
                    _vm._v(" "),
                    _c("a", { staticClass: "float-right" }, [
                      _vm._v(_vm._s(_vm.teacher.birthdate))
                    ])
                  ]),
                  _vm._v(" "),
                  _c("li", { staticClass: "list-group-item" }, [
                    _c("b", { staticClass: "float-left" }, [
                      _vm._v("Specialization")
                    ]),
                    _vm._v(" "),
                    _c("a", { staticClass: "float-right" }, [
                      _vm._v(_vm._s(_vm.teacher.specialization))
                    ])
                  ]),
                  _vm._v(" "),
                  _c("li", { staticClass: "list-group-item" }, [
                    _c("b", { staticClass: "float-left" }, [
                      _vm._v("Contact Number")
                    ]),
                    _vm._v(" "),
                    _c("a", { staticClass: "float-right" }, [
                      _vm._v(_vm._s(_vm.teacher.contact_number))
                    ])
                  ]),
                  _vm._v(" "),
                  _c("li", { staticClass: "list-group-item" }, [
                    _c("b", { staticClass: "float-left" }, [
                      _vm._v("Citizenship")
                    ]),
                    _vm._v(" "),
                    _c("a", { staticClass: "float-right" }, [
                      _vm._v(_vm._s(_vm.teacher.citizenship))
                    ])
                  ]),
                  _c("li", { staticClass: "list-group-item" }, [
                    _c("b", { staticClass: "float-left" }, [
                      _vm._v("Religion")
                    ]),
                    _vm._v(" "),
                    _c("a", { staticClass: "float-right" }, [
                      _vm._v(_vm._s(_vm.teacher.religion))
                    ])
                  ]),
                  _vm._v(" "),
                  _c("li", { staticClass: "list-group-item" }, [
                    _c("b", { staticClass: "float-left" }, [_vm._v("Address")]),
                    _vm._v(" "),
                    _c("a", { staticClass: "float-right" }, [
                      _vm._v(_vm._s(_vm.address(_vm.teacher)))
                    ])
                  ])
                ]
              )
            ])
          ])
        ])
      ])
    ]
  )
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "button",
      {
        staticClass: "close",
        attrs: {
          type: "button",
          "data-dismiss": "modal",
          "aria-label": "Close"
        }
      },
      [_c("span", { attrs: { "aria-hidden": "true" } }, [_vm._v("×")])]
    )
  }
]
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/pages/principal/Teacher.vue?vue&type=template&id=b719d770&":
/*!***************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/pages/principal/Teacher.vue?vue&type=template&id=b719d770& ***!
  \***************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", { staticClass: "content-wrapper" }, [
    _vm._m(0),
    _vm._v(" "),
    _c("div", { staticClass: "content" }, [
      _c(
        "div",
        { staticClass: "container-fluid" },
        [
          _c("div", { staticClass: "card card-purple card-outline" }, [
            _c("div", { staticClass: "card-header" }, [
              _c("div", { staticClass: "card-title" }, [
                _c(
                  "button",
                  {
                    staticClass: "btn btn-success",
                    attrs: { type: "button" },
                    on: { click: _vm.showAddTeacherModal }
                  },
                  [
                    _c("i", { staticClass: "fas fa-plus" }),
                    _vm._v(" Add teacher\n                        ")
                  ]
                )
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "card-tools mt-1" }, [
                _c(
                  "div",
                  {
                    staticClass: "input-group",
                    staticStyle: { width: "200px" }
                  },
                  [
                    _c("input", {
                      directives: [
                        {
                          name: "model",
                          rawName: "v-model",
                          value: _vm.teacher_query,
                          expression: "teacher_query"
                        },
                        { name: "focus", rawName: "v-focus" }
                      ],
                      staticClass: "form-control float-right",
                      attrs: { type: "text", placeholder: "Search" },
                      domProps: { value: _vm.teacher_query },
                      on: {
                        keyup: _vm.searchTeachers,
                        input: function($event) {
                          if ($event.target.composing) {
                            return
                          }
                          _vm.teacher_query = $event.target.value
                        }
                      }
                    }),
                    _vm._v(" "),
                    _c("div", { staticClass: "input-group-append" }, [
                      _c(
                        "button",
                        {
                          staticClass: "btn btn-default",
                          attrs: { type: "button" },
                          on: { click: _vm.searchTeachers }
                        },
                        [_c("i", { staticClass: "fas fa-search" })]
                      )
                    ])
                  ]
                )
              ])
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "card-body" }, [
              _c("div", { staticClass: "table-responsive" }, [
                _c(
                  "table",
                  {
                    staticClass:
                      "table table-bordered table-hover table-head-fixed"
                  },
                  [
                    _vm._m(1),
                    _vm._v(" "),
                    _vm.teachers.data != undefined &&
                    _vm.teachers.data.length >= 1
                      ? _c(
                          "tbody",
                          _vm._l(_vm.teachers.data, function(teacher) {
                            return _c(
                              "tr",
                              { key: teacher.id, attrs: { teacher: teacher } },
                              [
                                _c("td", [_vm._v(_vm._s(teacher.full_name))]),
                                _vm._v(" "),
                                _c("td", [_vm._v(_vm._s(teacher.sex))]),
                                _vm._v(" "),
                                _c("td", [
                                  _vm._v(_vm._s(teacher.specialization))
                                ]),
                                _vm._v(" "),
                                _c("td", [
                                  _vm._v(_vm._s(teacher.contact_number))
                                ]),
                                _vm._v(" "),
                                _c("td", { staticClass: "text-center" }, [
                                  _c(
                                    "a",
                                    {
                                      staticStyle: { cursor: "pointer" },
                                      attrs: {
                                        role: "button",
                                        "data-toggle": "tooltip",
                                        "data-placement": "top",
                                        title: "View"
                                      }
                                    },
                                    [
                                      _c("i", {
                                        staticClass:
                                          "fas fa-eye text-success mr-2",
                                        on: {
                                          click: function($event) {
                                            return _vm.showTeacherInfoModal(
                                              teacher
                                            )
                                          }
                                        }
                                      })
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "a",
                                    {
                                      staticStyle: { cursor: "pointer" },
                                      attrs: {
                                        role: "button",
                                        "data-toggle": "tooltip",
                                        "data-placement": "top",
                                        title: "Edit"
                                      }
                                    },
                                    [
                                      _c("i", {
                                        staticClass:
                                          "fas fa-edit text-info mr-2",
                                        on: {
                                          click: function($event) {
                                            return _vm.showEditTeacherModal(
                                              teacher
                                            )
                                          }
                                        }
                                      })
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "a",
                                    {
                                      staticStyle: { cursor: "pointer" },
                                      attrs: {
                                        role: "button",
                                        "data-toggle": "tooltip",
                                        "data-placement": "top",
                                        title: "Delete"
                                      }
                                    },
                                    [
                                      _c("i", {
                                        staticClass:
                                          "fas fa-trash text-danger mr-2",
                                        on: {
                                          click: function($event) {
                                            return _vm.deleteTeacher(teacher.id)
                                          }
                                        }
                                      })
                                    ]
                                  )
                                ])
                              ]
                            )
                          }),
                          0
                        )
                      : _c("tbody", [
                          _c(
                            "th",
                            {
                              staticClass: "text-center",
                              attrs: { colspan: "5" }
                            },
                            [_vm._v(_vm._s(_vm.loadingText))]
                          )
                        ])
                  ]
                )
              ])
            ]),
            _vm._v(" "),
            _c(
              "div",
              { staticClass: "card-footer" },
              [
                _c("pagination", {
                  attrs: { data: _vm.teachers, limit: 1 },
                  on: { "pagination-change-page": _vm.loadTeachers }
                })
              ],
              1
            )
          ]),
          _vm._v(" "),
          _c("TeacherFormModal", {
            attrs: { teacherForm: _vm.form, editMode: _vm.editMode },
            on: { "reload-teachers": _vm.loadTeachers }
          }),
          _vm._v(" "),
          _c("TeacherInfoModal", { attrs: { teacher: _vm.teacher } })
        ],
        1
      )
    ])
  ])
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "content-header" }, [
      _c("div", { staticClass: "container-fluid" }, [
        _c("div", { staticClass: "row mb-2" }, [
          _c("div", { staticClass: "col-sm-6" }, [
            _c("h1", { staticClass: "m-0 text-dark" }, [
              _c("i", { staticClass: "nav-icon fas fa-chalkboard-teacher" }),
              _vm._v(" Teachers\n                    ")
            ])
          ]),
          _vm._v(" "),
          _c("div", { staticClass: "col-sm-6" })
        ])
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("thead", [
      _c("th", { attrs: { scope: "col" } }, [_vm._v("Name")]),
      _vm._v(" "),
      _c("th", { attrs: { scope: "col" } }, [_vm._v("Gender")]),
      _vm._v(" "),
      _c("th", { attrs: { scope: "col" } }, [_vm._v("Specialization")]),
      _vm._v(" "),
      _c("th", { attrs: { scope: "col" } }, [_vm._v("Contact Number")]),
      _vm._v(" "),
      _c("th", { staticClass: "text-center", attrs: { scope: "col" } }, [
        _vm._v("Action")
      ])
    ])
  }
]
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js":
/*!********************************************************************!*\
  !*** ./node_modules/vue-loader/lib/runtime/componentNormalizer.js ***!
  \********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return normalizeComponent; });
/* globals __VUE_SSR_CONTEXT__ */

// IMPORTANT: Do NOT use ES2015 features in this file (except for modules).
// This module is a runtime utility for cleaner component module output and will
// be included in the final webpack user bundle.

function normalizeComponent (
  scriptExports,
  render,
  staticRenderFns,
  functionalTemplate,
  injectStyles,
  scopeId,
  moduleIdentifier, /* server only */
  shadowMode /* vue-cli only */
) {
  // Vue.extend constructor export interop
  var options = typeof scriptExports === 'function'
    ? scriptExports.options
    : scriptExports

  // render functions
  if (render) {
    options.render = render
    options.staticRenderFns = staticRenderFns
    options._compiled = true
  }

  // functional template
  if (functionalTemplate) {
    options.functional = true
  }

  // scopedId
  if (scopeId) {
    options._scopeId = 'data-v-' + scopeId
  }

  var hook
  if (moduleIdentifier) { // server build
    hook = function (context) {
      // 2.3 injection
      context =
        context || // cached call
        (this.$vnode && this.$vnode.ssrContext) || // stateful
        (this.parent && this.parent.$vnode && this.parent.$vnode.ssrContext) // functional
      // 2.2 with runInNewContext: true
      if (!context && typeof __VUE_SSR_CONTEXT__ !== 'undefined') {
        context = __VUE_SSR_CONTEXT__
      }
      // inject component styles
      if (injectStyles) {
        injectStyles.call(this, context)
      }
      // register component module identifier for async chunk inferrence
      if (context && context._registeredComponents) {
        context._registeredComponents.add(moduleIdentifier)
      }
    }
    // used by ssr in case component is cached and beforeCreate
    // never gets called
    options._ssrRegister = hook
  } else if (injectStyles) {
    hook = shadowMode
      ? function () {
        injectStyles.call(
          this,
          (options.functional ? this.parent : this).$root.$options.shadowRoot
        )
      }
      : injectStyles
  }

  if (hook) {
    if (options.functional) {
      // for template-only hot-reload because in that case the render fn doesn't
      // go through the normalizer
      options._injectStyles = hook
      // register for functional component in vue file
      var originalRender = options.render
      options.render = function renderWithStyleInjection (h, context) {
        hook.call(context)
        return originalRender(h, context)
      }
    } else {
      // inject component registration as beforeCreate hook
      var existing = options.beforeCreate
      options.beforeCreate = existing
        ? [].concat(existing, hook)
        : [hook]
    }
  }

  return {
    exports: scriptExports,
    options: options
  }
}


/***/ }),

/***/ "./resources/js/components/principal/TeacherFormModal.vue":
/*!****************************************************************!*\
  !*** ./resources/js/components/principal/TeacherFormModal.vue ***!
  \****************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _TeacherFormModal_vue_vue_type_template_id_b27b6e1a___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./TeacherFormModal.vue?vue&type=template&id=b27b6e1a& */ "./resources/js/components/principal/TeacherFormModal.vue?vue&type=template&id=b27b6e1a&");
/* harmony import */ var _TeacherFormModal_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./TeacherFormModal.vue?vue&type=script&lang=js& */ "./resources/js/components/principal/TeacherFormModal.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _TeacherFormModal_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _TeacherFormModal_vue_vue_type_template_id_b27b6e1a___WEBPACK_IMPORTED_MODULE_0__["render"],
  _TeacherFormModal_vue_vue_type_template_id_b27b6e1a___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/principal/TeacherFormModal.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/principal/TeacherFormModal.vue?vue&type=script&lang=js&":
/*!*****************************************************************************************!*\
  !*** ./resources/js/components/principal/TeacherFormModal.vue?vue&type=script&lang=js& ***!
  \*****************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_TeacherFormModal_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./TeacherFormModal.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/principal/TeacherFormModal.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_TeacherFormModal_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/principal/TeacherFormModal.vue?vue&type=template&id=b27b6e1a&":
/*!***********************************************************************************************!*\
  !*** ./resources/js/components/principal/TeacherFormModal.vue?vue&type=template&id=b27b6e1a& ***!
  \***********************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_TeacherFormModal_vue_vue_type_template_id_b27b6e1a___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./TeacherFormModal.vue?vue&type=template&id=b27b6e1a& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/principal/TeacherFormModal.vue?vue&type=template&id=b27b6e1a&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_TeacherFormModal_vue_vue_type_template_id_b27b6e1a___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_TeacherFormModal_vue_vue_type_template_id_b27b6e1a___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/js/components/principal/TeacherInfoModal.vue":
/*!****************************************************************!*\
  !*** ./resources/js/components/principal/TeacherInfoModal.vue ***!
  \****************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _TeacherInfoModal_vue_vue_type_template_id_58743849___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./TeacherInfoModal.vue?vue&type=template&id=58743849& */ "./resources/js/components/principal/TeacherInfoModal.vue?vue&type=template&id=58743849&");
/* harmony import */ var _TeacherInfoModal_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./TeacherInfoModal.vue?vue&type=script&lang=js& */ "./resources/js/components/principal/TeacherInfoModal.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _TeacherInfoModal_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _TeacherInfoModal_vue_vue_type_template_id_58743849___WEBPACK_IMPORTED_MODULE_0__["render"],
  _TeacherInfoModal_vue_vue_type_template_id_58743849___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/principal/TeacherInfoModal.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/principal/TeacherInfoModal.vue?vue&type=script&lang=js&":
/*!*****************************************************************************************!*\
  !*** ./resources/js/components/principal/TeacherInfoModal.vue?vue&type=script&lang=js& ***!
  \*****************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_TeacherInfoModal_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./TeacherInfoModal.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/principal/TeacherInfoModal.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_TeacherInfoModal_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/principal/TeacherInfoModal.vue?vue&type=template&id=58743849&":
/*!***********************************************************************************************!*\
  !*** ./resources/js/components/principal/TeacherInfoModal.vue?vue&type=template&id=58743849& ***!
  \***********************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_TeacherInfoModal_vue_vue_type_template_id_58743849___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./TeacherInfoModal.vue?vue&type=template&id=58743849& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/principal/TeacherInfoModal.vue?vue&type=template&id=58743849&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_TeacherInfoModal_vue_vue_type_template_id_58743849___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_TeacherInfoModal_vue_vue_type_template_id_58743849___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/js/pages/principal/Teacher.vue":
/*!**************************************************!*\
  !*** ./resources/js/pages/principal/Teacher.vue ***!
  \**************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Teacher_vue_vue_type_template_id_b719d770___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Teacher.vue?vue&type=template&id=b719d770& */ "./resources/js/pages/principal/Teacher.vue?vue&type=template&id=b719d770&");
/* harmony import */ var _Teacher_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Teacher.vue?vue&type=script&lang=js& */ "./resources/js/pages/principal/Teacher.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _Teacher_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Teacher_vue_vue_type_template_id_b719d770___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Teacher_vue_vue_type_template_id_b719d770___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/pages/principal/Teacher.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/pages/principal/Teacher.vue?vue&type=script&lang=js&":
/*!***************************************************************************!*\
  !*** ./resources/js/pages/principal/Teacher.vue?vue&type=script&lang=js& ***!
  \***************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Teacher_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./Teacher.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/pages/principal/Teacher.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Teacher_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/pages/principal/Teacher.vue?vue&type=template&id=b719d770&":
/*!*********************************************************************************!*\
  !*** ./resources/js/pages/principal/Teacher.vue?vue&type=template&id=b719d770& ***!
  \*********************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Teacher_vue_vue_type_template_id_b719d770___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./Teacher.vue?vue&type=template&id=b719d770& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/pages/principal/Teacher.vue?vue&type=template&id=b719d770&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Teacher_vue_vue_type_template_id_b719d770___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Teacher_vue_vue_type_template_id_b719d770___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);