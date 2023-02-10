<?php
$rows = get_field('course_schedule');
    if( $rows ) {
        ?>
        
        <table class="schedule-table">
            <caption>Weekly Course Schedule</caption>
            <thead>
                <tr>
                    <th>
                        <?php esc_html_e(get_field_object('course_schedule')['sub_fields'][0]['label']); ?>
                    </th>
                    <th>
                        <?php esc_html_e(get_field_object('course_schedule')['sub_fields'][1]['label']); ?>
                    </th>
                    <th>
                        <?php esc_html_e(get_field_object('course_schedule')['sub_fields'][2]['label']); ?>
                    </th>
                    </tr>
            </thead>
            <tbody>
            <?php 
            foreach( $rows as $row ) { 
                ?>
                <tr>
                    <td><?php esc_html_e($row['schedule_date']); ?></td>
                    <td><?php esc_html_e($row['schedule_course']); ?></td>
                    <?php
                    //Code below is modified but based on this:
                    //https://stackoverflow.com/questions/7447689/convert-an-object-to-an-array
                    $array = json_decode(json_encode($row['schedule_instructor'][0]), true);
                    ?>
                    <td><?php esc_html_e($array['post_title']); ?></td>
                </tr>
            <?php
            }
            ?>
            </tbody>
        </table>
    <?php
    }
    ?>