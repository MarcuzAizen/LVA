// TODO: Reset Vuex Module State

export default {
    namespaced: true,

    state: {
        lrn: '',
        lrnExists: false,
        first_name: '',
        middle_name: '',
        last_name: '',
        suffix: '',
        sex: '',
        birthdate: '',
        mother_tongue: '',
        contact_number: '',
        previous_school: '',
        ethnic: '',
        religion: '',
        purok: '',
        barangay: '',
        city: '',
        province: ''    
    },

    mutations: {
        setLrn(state, lrn) {
            state.lrn = lrn;
        },

        setLrnExists(state, lrnExists) {
            state.lrnExists = lrnExists
        },
        
        setFirstName(state, first_name) {
            state.first_name = first_name;
        },
        
        setMiddleName(state, middle_name) {
            state.middle_name = middle_name;
        },
        
        setLastName(state, last_name) {
            state.last_name = last_name;
        },
        
        setSuffix(state, suffix) {
            state.suffix = suffix;
        },
        
        setSex(state, sex) {
            state.sex = sex;
        },
        
        setBirthdate(state, birthdate) {
            state.birthdate = birthdate;
        },
        
        setMotherTongue(state, mother_tongue) {
            state.mother_tongue = mother_tongue;
        },
        
        setContactNumber(state, contact_number) {
            state.contact_number = contact_number;
        },
        
        setPreviousSchool(state, previous_school) {
            state.previous_school = previous_school;
        },
        
        setEthnic(state, ethnic) {
            state.ethnic = ethnic;
        },
        
        setReligion(state, religion) {
            state.religion = religion;
        },
        
        setPurok(state, purok) {
            state.purok = purok;
        },
    
        setBarangay(state, barangay) {
            state.barangay = barangay;
        },
        
        setCity(state, city) {
            state.city = city;
        },
        
        setProvince(state, province) {
            state.province = province;
        },
    }
}