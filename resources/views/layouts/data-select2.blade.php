<script>
    function select2Users(className, set) {
        $(className).select2({
            theme: 'bootstrap4',
            allowClear: true,
            placeholder: 'Pilih',
            ajax: {
                url: "{!!  str_replace('http://', 'https://', url('data/users')) !!}",
                dataType: 'json',
                data: function (params) {
                    var queryParameters = {
                        term: params.term
                    }
                    return queryParameters;
                },
                processResults: function (data) {
                    return {
                        results: $.map(data, function (item) {
                            
                        })
                    };
                }
            }
        });
    }

    function select2Outlets(className, set) {
        $(className).select2({
            theme: 'bootstrap4',
            allowClear: true,
            placeholder: 'Pilih Outlet',
            ajax: {
                url: "{!!  str_replace('http://', 'https://', url('data/outlets')) !!}",
                dataType: 'json',
                data: function (params) {
                    var queryParameters = {
                        term: params.term
                    }
                    return queryParameters;
                },
                processResults: function (data) {
                    return {
                        results: $.map(data, function (item) {
                            if(set == 'id') {
                                return {
                                    text: item.name,
                                    id: item.id
                                }
                            } else {
                                return {
                                    text: item.name,
                                    id: item.name
                                }
                            }
                        })
                    };
                }
            }
        });
    }

    function select2Doctors(className, set) {
        $(className).select2({
            theme: 'bootstrap4',
            allowClear: true,
            placeholder: 'Pilih Customer',
            ajax: {
                url: "{!!  str_replace('http://', 'https://', url('data/doctors')) !!}",
                dataType: 'json',
                data: function (params) {
                    var queryParameters = {
                        term: params.term
                    }
                    return queryParameters;
                },
                processResults: function (data) {
                    return {
                        results: $.map(data, function (item) {
                            if(set == 'id') {
                                return {
                                    text: item.name,
                                    id: item.id
                                }
                            } else {
                                return {
                                    text: item.name,
                                    id: item.name
                                }
                            }
                        })
                    };
                }
            }
        });
    }

    function select2Task(className, set) {
        $(className).select2({
            theme: 'bootstrap4',
            allowClear: true,
            placeholder: 'Pilih',
            ajax: {
                url: "{!!  str_replace('http://', 'https://', url('data/tasks')) !!}",
                dataType: 'json',
                data: function (params) {
                    var queryParameters = {
                        term: params.term
                    }
                    return queryParameters;
                },
                processResults: function (data) {
                    return {
                        results: $.map(data, function (item) {
                            if(set == 'id') {
                                return {
                                    text: item.title,
                                    id: item.id
                                }
                            } else {
                                return {
                                    text: item.title,
                                    id: item.title
                                }
                            }
                        })
                    };
                }
            }
        });
    }

    function select2Product(className, set) {
        $(className).select2({
            theme: 'bootstrap4',
            allowClear: true,
            placeholder: 'Pilih',
            ajax: {
                url: "{!!  str_replace('http://', 'https://', url('data/products')) !!}",
                dataType: 'json',
                data: function (params) {
                    var queryParameters = {
                        term: params.term
                    }
                    return queryParameters;
                },
                processResults: function (data) {
                    return {
                        results: $.map(data, function (item) {
                            if(set == 'id') {
                                return {
                                    text: item.name,
                                    id: item.id
                                }
                            } else {
                                return {
                                    text: item.name,
                                    id: item.name
                                }
                            }
                        })
                    };
                }
            }
        });
    }
</script>