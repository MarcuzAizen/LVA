<template>
    <div :id="`schedule-modal-${name}`" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-gradient-purple">
                    <img
                        src="/images/app/apple-touch-icon.png"
                        alt="LVA Logo"
                        height="50"
                        width="50"
                    />&nbsp;&nbsp;
                    <h4 class="p-2" v-if="editMode">Edit schedule</h4>
                    <h4 class="p-2" v-else>Set schedule for {{ name }}</h4>
                    <button
                        type="button"
                        class="close"
                        data-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- /.modal-header -->
                
                <form>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label>Time Start</label>
                                    <input type="time" class="form-control">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label>Time End</label>
                                    <input type="time" class="form-control">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label>Day</label>
                                    <select class="form-control">
                                        <option value="">Select day</option>
                                        <option value="M">Monday</option>
                                        <option value="T">Tuesday</option>
                                        <option value="W">Wednesday</option>
                                        <option value="H">Thursday</option>
                                        <option value="F">Friday</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- /.row -->

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Subject</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Teacher</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.modal-body -->

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success" v-if="editMode">Save changes</button>
                        <button type="submit" class="btn btn-success" v-else>Submit</button>
                    </div>
                    <!-- /.modal-footer -->
                </form>
                <!-- /.form -->
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
</template>

<script>
export default {
    name: 'ScheduleModal',

    props: {
        name: String,
        editMode: Boolean
    }
}
</script>
