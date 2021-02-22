const getDefaultState = () => {
    return {
        first_name: '',
        last_name: '',
        suffix: '',
        sex: 'F',
        birthdate: '',
        contact_number: '',
        religion: '',
        occupation: ''
    }
}

export default {
    namespaced: true,

    state: getDefaultState(),

    mutations: {
        setFirstName(state, first_name) {
            state.first_name = first_name;
        },

        setLastName(state, last_name) {
            state.last_name = last_name;
        },

        setSuffix(state, suffix) {
            state.suffix = suffix;
        },

        setBirthdate(state, birthdate) {
            state.birthdate = birthdate;
        },

        setContactNumber(state, contact_number) {
            state.contact_number = contact_number;
        },

        setReligion(state, religion) {
            state.religion = religion;
        },

        setOccupation(state, occupation) {
            state.occupation = occupation;
        },

        resetState(state) {
            Object.assign(state, getDefaultState())
        }
    }
}