<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events</title>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="my-4">Sports Events</h1>
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th><a href="<?php echo e(route('events.index', ['sort' => 'home_team'])); ?>" class="text-white">Home Team</a></th>
                    <th><a href="<?php echo e(route('events.index', ['sort' => 'away_team'])); ?>" class="text-white">Away Team</a></th>
                    <th><a href="<?php echo e(route('events.index', ['sort' => 'match_date'])); ?>" class="text-white">Match Date</a></th>
                    <th><a href="<?php echo e(route('events.index', ['sort' => 'match_time'])); ?>" class="text-white">Match Time</a></th>
                    <th>Home Goals</th>
                    <th>Away Goals</th>
                    <th>Referee</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($event->home_team); ?></td>
                        <td><?php echo e($event->away_team); ?></td>
                        <td><?php echo e($event->match_date); ?></td>
                        <td><?php echo e($event->match_time); ?></td>
                        <td><?php echo e($event->home_goal); ?></td>
                        <td><?php echo e($event->away_goal); ?></td>
                        <td><?php echo e($event->referee); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html><?php /**PATH /var/www/resources/views/events/index.blade.php ENDPATH**/ ?>