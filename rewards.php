<?php 
for ($i = 1; $i <= 10; $i++) {
    $reward_tier = get_field('reward_tier_' . $i);
    if ($reward_tier['title'] == '' || $reward_tier['description'] == '' || $reward_tier['pledge_amount'] == '') {
        continue;
    }
    ?>
    <a href="/donate" class="reward-link-container">
        <div class="reward-tier">
            <div class="reward-tier-pledge">
                Pledge <?php echo $reward_tier['pledge_amount'] ?> or more
            </div>
            <div class="reward-tier-title">
                <?php echo $reward_tier['title']; ?>
            </div>
            <p> <?php echo $reward_tier['description'] ?> </p>
            <?php if ($reward_tier['backers'] > 0): ?>
                <span class="reward-tier-backers"> <?php echo $reward_tier['backers'] ?> backers </span>
            <?php endif; ?>
        </div>
    </a>
    <?php
}

?>