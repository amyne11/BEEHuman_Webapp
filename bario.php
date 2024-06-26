<!DOCTYPE html>
<html lang="en-US">
  <head>
    <?php
    include "backend/includes/auth-user.php";
    ?>
    <link href="css/bariobg.css" rel="stylesheet">
    <meta charset="utf-8" />
    <title>Bario</title>
    <style>
      * {
        padding: 0;
        margin: 0;
      }
      canvas {
        background: #eeeeee;
        display: block;
        margin: 0 auto;
      }
    </style>
  </head>
  <body>
    
    <input type="hidden" id="tb">
    
    <canvas id="myCanvas" width="720" height="480"></canvas>
    <script>
      const canvas = document.getElementById("myCanvas");
      const screen = canvas.getContext("2d");
      var menuImage = new Image();
      menuImage.src = "https://i.ibb.co/bLpLPN0/Menu.png"
      var background = new Image();
      background.src = "https://i.ibb.co/cFzwsJC/Magic-grotto3.jpg";
      var grassBlock = new Image();
      grassBlock.src = "https://i.ibb.co/Dk5zK8n/Grass-Block.png";
      var spikeBlock = new Image();
      spikeBlock.src = "https://i.ibb.co/t362ZZr/pngfind-com-spikes-png-816849.png";
      var block = new Image();
      block.src = "https://i.ibb.co/S3LzjCg/Exclamation-Block.png";
      var bomb = new Image();
      bomb.src = "https://i.ibb.co/0yZGhD9/Bomb.png";
      var bricks = new Image();
      bricks.src = "https://i.ibb.co/FwNBjG2/Bricks.png";
      var explosion1 = new Image();
      explosion1.src = "https://i.ibb.co/qNF1XDf/Explosion1.png";
      var explosion2 = new Image();
      explosion2.src = "https://i.ibb.co/wswFrbr/Explosion2.png";
      var explosion3 = new Image();
      explosion3.src = "https://i.ibb.co/k0tmnQw/Explosion3.png";
      var explosion4 = new Image();
      explosion4.src = "https://i.ibb.co/wgc33Zb/Explosion4.png";
      var explosion5 = new Image();
      explosion5.src = "https://i.ibb.co/wKxbkBf/Explosion5.png";
      var explosion6 = new Image();
      explosion6.src = "https://i.ibb.co/TvwmHXR/Explosion6.png";
      var explosion7 = new Image();
      explosion7.src = "https://i.ibb.co/yg82Xsw/Explosion7.png";
      var explosion8 = new Image();
      explosion8.src = "https://i.ibb.co/sWCcF01/Explosion8.png";
      let explosions = [explosion1, explosion2, explosion3, explosion4, explosion5, explosion6, explosion7, explosion8];
      var bfaceright = new Image();
      bfaceright.src = "https://i.ibb.co/RN4mLy7/BStat-Right.png";
      var bwalkright1 = new Image();
      bwalkright1.src = "https://i.ibb.co/GCZ2LnY/BMove-Right1.png";
      var bwalkright2 = new Image();
      bwalkright2.src = "https://i.ibb.co/9WFMwkC/BMove-Right2.png";
      var bfaceleft = new Image();
      bfaceleft.src = "https://i.ibb.co/9TymgVQ/BStat-Left.png";
      var bwalkleft1 = new Image();
      bwalkleft1.src = "https://i.ibb.co/ygk5HNV/BMove-Left1.png";
      var bwalkleft2 = new Image();
      bwalkleft2.src = "https://i.ibb.co/JKcCBD0/BMove-Left-2.png";
      var lizard1 = new Image();
      lizard1.src = "https://i.ibb.co/N32HhSj/Lizard1.png";
      var lizard2 = new Image();
      lizard2.src = "https://i.ibb.co/tLn0PkH/Lizard2.png";
      var lizard3 = new Image();
      lizard3.src = "https://i.ibb.co/3pv7gB3/Lizard3.png";
      var lizardLightning = new Image();
      lizardLightning.src = "https://i.ibb.co/D4FNB29/LIGHTNINGLIZARD.png";
      var lightning = new Image();
      lightning.src = "https://i.ibb.co/b5RTcs0/Lightning.png";
      let lizard_imgs = [lizard1, lizard2, lizard3, lizardLightning, lizard3, lizard2];
      let right_walk_imgs = [bfaceright, bwalkright1, bfaceright, bwalkright2];
      let left_walk_imgs = [bfaceleft, bwalkleft1, bfaceleft, bwalkleft2];
      const bgmusic = new Audio("https://vgmsite.com/soundtracks/peggle/nwvnlomi/12_Peggle%20Beat%2011.mp3");
      bgmusic.loop = true;
      const Swishswishswishahouseremix = new Audio("https://audio.jukehost.co.uk/W2HKXgLJszW9PomtKRtINO2VD89c5KaL")
      let rightindex = 0;
      let leftindex = 0;
      let lastPressed = "Right";
      let cycleIP = false;
      const b_height = 30;
      const b_width = 16;
      let score = 0;
      let x = 0;
      let y = 240;
      let rightPressed = false;
      let leftPressed = false;
      let spacePressed = false;
      let total_jump = 0;
      let dx = 0;
      let dy = 0;
      let explosion_phase = 0;
      let game_started = false;
      let seg = [
      [[4, 4],
      [4, 4],
      [4, 4],
      [4, 4],
      [4, 4],
      [4, 4],
      [4, 4],
      [4, 4],
      [4, 4],
      [4, 4],
      [4, 4],
      [4, 4]],
        [[0, 0],
        [0, 0],
        [0, 0],
        [0, 0],
        [0, 0],
        [0, 0],
        [0, 0],
        [0, 0],
        [0, 0],
        [0, 0],
        [0, 0],
        [0, 0]],
        [[0, 0],
        [1, 1],
        [0, 0],
        [0, 0],
        [0, 0],
        [0, 0],
        [0, 0],
        [0, 0],
        [0, 0],
        [0, 0],
        [0, 0],
        [0, 0]],
        [[0, 0],
        [0, 0],
        [1, 1],
        [0, 0],
        [0, 0],
        [0, 0],
        [0, 0],
        [0, 0],
        [0, 0],
        [0, 0],
        [0, 0],
        [0, 0]],
        [[0, 0],
        [0, 0],
        [0, 0],
        [1, 1],
        [0, 0],
        [0, 0],
        [0, 0],
        [0, 0],
        [0, 0],
        [0, 0],
        [0, 0],
        [0, 0]],
        [[0, 0],
        [0, 0],
        [0, 0],
        [0, 0],
        [1, 1],
        [0, 0],
        [0, 0],
        [0, 0],
        [0, 0],
        [0, 0],
        [0, 0],
        [0, 0]],
        [[0, 0],
        [0, 0],
        [0, 0],
        [0, 0],
        [0, 0],
        [1, 1],
        [0, 0],
        [0, 0],
        [0, 0],
        [0, 0],
        [0, 0],
        [0, 0]],
        [[0, 0],
        [0, 0],
        [0, 0],
        [0, 0],
        [0, 0],
        [0, 0],
        [1, 1],
        [0, 0],
        [0, 0],
        [0, 0],
        [0, 0],
        [0, 0]],
        [[0, 0],
        [0, 0],
        [0, 0],
        [0, 0],
        [0, 0],
        [0, 0],
        [0, 0],
        [1, 1],
        [1, 1],
        [1, 1],
        [1, 1],
        [1, 1]],
        [[0, 0],
        [0, 0],
        [0, 0],
        [0, 0],
        [0, 0],
        [0, 0],
        [0, 0],
        [0, 0],
        [1, 1],
        [0, 0],
        [2, 0],
        [0, 0]],
        [[0, 0],
        [0, 0],
        [0, 2],
        [2, 0],
        [0, 0],
        [0, 0],
        [0, 0],
        [0, 0],
        [0, 0],
        [1, 1],
        [0, 0],
        [0, 0]],
        [[0, 0],
        [0, 0],
        [0, 0],
        [0, 0],
        [2, 0],
        [0, 2],
        [0, 0],
        [0, 0],
        [0, 0],
        [0, 0],
        [1, 1],
        [0, 0]],
        [[0, 0],
        [0, 0],
        [0, 0],
        [0, 0],
        [0, 0],
        [0, 0],
        [0, 0],
        [0, 0],
        [0, 0],
        [0, 0],
        [2, 2],
        [1, 1]],
        [[0, 0],
        [0, 0],
        [0, 0],
        [1, 1],
        [0, 0],
        [0, 0],
        [0, 0],
        [1, 1],
        [0, 0],
        [0, 0],
        [0, 0],
        [2, 2]],
        [[0, 0],
        [0, 0],
        [0, 0],
        [0, 0],
        [0, 0],
        [1, 1],
        [0, 0],
        [0, 0],
        [0, 0],
        [1, 1],
        [0, 0],
        [0, 0]],
        [[0, 0],
        [0, 0],
        [0, 0],
        [0, 0],
        [0, 0],
        [1, 1],
        [0, 0],
        [0, 0],
        [0, 0],
        [0, 0],
        [0, 0],
        [1, 1]],
        [[0, 0],
        [0, 0],
        [1, 1],
        [0, 0],
        [0, 0],
        [0, 0],
        [0, 0],
        [0, 0],
        [0, 0],
        [0, 0],
        [1, 0],
        [0, 0]],
        [[0, 0],
        [0, 1],
        [0, 0],
        [0, 0],
        [0, 0],
        [1, 0],
        [0, 0],
        [0, 0],
        [0, 0],
        [1, 1],
        [0, 0],
        [0, 0]],
        [[0, 0],
        [0, 0],
        [1, 0],
        [0, 0],
        [0, 0],
        [1, 1],
        [0, 0],
        [0, 0],
        [0, 0],
        [0, 1],
        [0, 0],
        [0, 0]],
        [[0, 0],
        [1, 0],
        [0, 0],
        [0, 0],
        [2, 1],
        [0, 0],
        [0, 0],
        [1, 0],
        [0, 0],
        [0, 0],
        [0, 1],
        [0, 0]],
        [[0, 0],
        [0, 0],
        [1, 1],
        [0, 0],
        [0, 2],
        [0, 0],
        [0, 0],
        [0, 1],
        [1, 1],
        [2, 0],
        [0, 0],
        [0, 0]],
        [[0, 0],
        [1, 1],
        [0, 0],
        [0, 0],
        [0, 0],
        [0, 0],
        [1, 1],
        [0, 0],
        [0, 0],
        [0, 0],
        [0, 0],
        [1, 1]],
        [[0, 2],
        [0, 0],
        [0, 0],
        [1, 0],
        [2, 1],
        [0, 0],
        [0, 0],
        [0, 1],
        [1, 0],
        [0, 0],
        [0, 0],
        [0, 0]],
        [[2, 2],
        [2, 2],
        [0, 0],
        [0, 0],
        [2, 0],
        [0, 0],
        [0, 0],
        [0, 1],
        [0, 2],
        [0, 2],
        [2, 2],
        [2, 2]],
        [[0, 2],
        [0, 0],
        [0, 0],
        [0, 0],
        [0, 0],
        [0, 0],
        [0, 0],
        [0, 0],
        [0, 0],
        [0, 0],
        [1, 1],
        [1, 1]],
        [[0, 2],
        [0, 0],
        [2, 2],
        [0, 0],
        [0, 0],
        [0, 0],
        [0, 0],
        [1, 1],
        [0, 0],
        [0, 0],
        [0, 0],
        [0, 0]],
        [[2, 2],
        [2, 2],
        [0, 0],
        [0, 0],
        [0, 0],
        [0, 0],
        [0, 0],
        [0, 0],
        [0, 0],
        [0, 0],
        [2, 2],
        [2, 2]],
        [[1, 0],
        [0, 0],
        [0, 0],
        [0, 1],
        [0, 1],
        [0, 0],
        [0, 0],
        [0, 0],
        [0, 1],
        [1, 0],
        [0, 0],
        [0, 0]],
        [[1, 0],
        [1, 0],
        [1, 0],
        [0, 0],
        [0, 0],
        [0, 1],
        [0, 1],
        [0, 1],
        [0, 0],
        [0, 0],
        [1, 0],
        [1, 0]],
        [[0, 0],
        [0, 0],
        [0, 0],
        [0, 0],
        [0, 0],
        [0, 0],
        [0, 0],
        [0, 0],
        [0, 3],
        [0, 0],
        [0, 0],
        [1, 1]]
      ];
      let grid = [];
      let queue = [];
      let platforms = [];
      let spikes = [];
      let prev_locs = [];
      let blox = 0;
      let bomb_loc = [-1000, -1000, -1000, -1000];
      let block_active = false;
      let bomb_acquired = false;
      let draw_bomb = false;
      let expIP = false;
      let spawn_bomb = false;
      let swisha_house_remix = false;
      let lizardspawned = false;
      let lizardindex = 0;
      let throwlightning = false;
      let lightningy = 0;
      let lightningx = 0;
      let placed_bomb_loc = 0;
      let bomb_sector = 0;
      let xxplosive = 0;
      let square_size = 40;
      window.onload = function() {
        screen.drawImage(menuImage, 0, 0);
      }
      function get_rand_seg() {
        return Math.floor(Math.random() * (seg.length - 1) + 1);
      }
      function show_score() {
        screen.font="30px Arial";
        screen.fillStyle = "black";
        screen.textAlign = "right";
        screen.fillText("Score: " + score, canvas.width/5, canvas.height/12);
      }
      function draw_lizard() {
        lizardspawned = true;
        lizardindex = 0;
        setTimeout(() => {  lizard_index_function(); }, 2000);
      }
      function lizard_index_function() {
        if (lizardindex + 1 == 6) {
          lizardindex = 0;
        } else {
          lizardindex += 1;
        }
        if (lizardindex == 4 && !throwlightning) {
          throwlightning = true;
          lightningy = y - 10;
          lightningx = 600 - 38;
          move_lightning();
        }
        if (lizardspawned) {
          setTimeout(() => {  lizard_index_function(); }, 2000);
        }
      }
      function move_lightning() {
        lightningx -= 2;
        if (lightningx < -38) {
          throwlightning = false;
        }
        if (throwlightning && lizardspawned) {
            setTimeout(() => { move_lightning(); }, 10);
        }
      }
      function draw_barry() {
        if (rightPressed) {
            screen.drawImage(right_walk_imgs[rightindex], 352, y - 15);
        } else if (leftPressed) {
            screen.drawImage(left_walk_imgs[leftindex], 352, y - 15);
        } else if (lastPressed == "Right") {
            screen.drawImage(right_walk_imgs[rightindex], 352, y - 15);
        } else if (lastPressed == "Left") {
            screen.drawImage(left_walk_imgs[leftindex], 352, y - 15);
        }
        if (draw_bomb) {
          screen.drawImage(bomb, placed_bomb_loc[0], placed_bomb_loc[1]);
          if (!collision()) {
            placed_bomb_loc[0] += dx
          }
        }
        if (lizardspawned) {
          screen.drawImage(lizard_imgs[lizardindex], 600, y - 25, 50, 50);
          if (throwlightning) {
            screen.drawImage(lightning, lightningx, lightningy);
          }
        }
      }
      function move() {
        if (rightPressed) {
          dx = -2.5;
        }
        if (leftPressed) {
          dx = 2.5;
        }
        if (spacePressed) {
          dy = -3;
        }
        if (!rightPressed && !leftPressed) {
          dx = 0;
        }
        if (!collision()) {
            x += dx;
            y += dy;
            if (throwlightning && lizardspawned) {
              lightningx += dx
            }
            total_jump += dy;
            if (total_jump < -150) {
                spacePressed = false;
            }
            if (x <= -80) {
                adjust_queue_right();
            } else if (x >= 80) {
                adjust_queue_left();
            } else if (x > 0 && prev_locs.length == 0) {
                prev_locs.push(get_rand_seg());
            }
        }
        gen_trn();
        draw_barry();
      }
      function gravity() {
        if (grav_collision(0.5) == false) {
            dy = 0.5;
        } else {
            dy = 0;
        }
        y += dy;
      }
      function grav_collision(spoogeh) {
        let hit = false
        for (let i = 0; i < platforms.length; i++) {
            if (platforms[i][0] < 352 + b_width && platforms[i][2] > 352 && platforms[i][1] < y - 15 + b_height + spoogeh && platforms[i][3] > y - 15 + spoogeh) {
                hit = true;
            }
        }
        return hit;
      }
      function collision() {
        let hit = false;
        for (let i = 0; i < platforms.length; i++) {
            if (platforms[i][0] + dx < 352 + b_width && platforms[i][2] + dx > 352 && platforms[i][1] < y - 15 + b_height + dy && platforms[i][3] > y - 15 + dy) {
              hit = true;
            }
        }
        return hit;
      }
      function spike_col() {
        let hit = false;
        for (let i = 0; i < spikes.length; i++) {
            if (spikes[i][0] < 352 + b_width && spikes[i][2] > 352 && spikes[i][1] < y - 15 + b_height && spikes[i][3] > y - 15 || y > 720) {
                gameOver();
                hit = true;
            } else if (lightningx < 352 + b_width && lightningx + 38 > 352 && lightningy < y - 15 + b_height && lightningy + 18 > y - 15 && throwlightning) {
                gameOver();
                hit = true;
            }
        }
        return hit;
      }
      function blox_col() {
        if (blox[3] + 1 == y - 15 && blox[0] < 352 + b_width && blox[2] > 352 && spawn_bomb) {
          block_active = true;
        }
        if (bomb_loc[0] < 352 + b_width && bomb_loc[2] > 352 && bomb_loc[1] < y - 15 + b_height && bomb_loc[3] > y - 15 && !bomb_acquired && spawn_bomb && block_active) {
          give_bomb();
        }
      }
      function place_bomb() {
        expIP = true;
        bomb_acquired = false;
        draw_bomb = true;
        placed_bomb_loc = [340, y - 25];
        xxplosive = x;
        if (x >= 40) {
            bomb_sector = queue[4];
        } else if (x <= -40) {
            bomb_sector = queue[6];
        } else {
            bomb_sector = queue[5];
        }
        setTimeout(() => {  explode(); }, 3000);
      }
      function explode() {
        draw_bomb = false;
        let x5 = 0;
        for (let i = 0; i < queue.length; i++) {
          if (queue[i] == [bomb_sector]) {
            queue[i] = 0;
            x5 = i;
          }
        }
        explode_lizard();
        explosion_phase = 0;
        setTimeout(() => { cycle(x5); }, 150);
      }
      function explode_lizard() {
        if (placed_bomb_loc[0] + xxplosive - 20 < 650 && placed_bomb_loc[0] + xxplosive + 60 > 600) {
          lizardspawned = false;
          score += 50
          generate_random_lizard();
        } 
      }
      function cycle(x5) {
        if (explosion_phase < 7) {
            explosion_phase += 1;
            setTimeout(() => { cycle(x5); }, 150);
        }
        if (explosion_phase == 7) {
            queue[x5] = 1;
            expIP = false;
        }
      }
      function give_bomb() {
        spawn_bomb = false;
        bomb_acquired = true;
        score += 10;
      }
      function gameOver() {
        var invScore = document.getElementById("tb")
        invScore.value = score;
        throwlightning = false;
        game_started = false;
        screen.font = "40px Arial";
        screen.fillStyle = "black";
        screen.textAlign = "center";
        screen.fillText("Game Over!", canvas.width/2, canvas.height/2.5);
        screen.fillText("Your score was: " + score, canvas.width/2, canvas.height/2)
        screen.fillText("Press enter to play again!", canvas.width/2, canvas.height/1.7)
        game_started = false;
        storeScore(score);
      }

      function storeScore(score)
      {
        let username = document.querySelector('[name=username]').content;
        let data = {
          username: username,
          score: score
        };

        fetch("backend/store-bario.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify(data)
        }).then(res => {
          return res.json();
        }).then(data => {
          if (data['newHighScore']) {
            alert("You achieved a new high score")
          }
    })
      }

      function gen_trn() {
        let activer = false;
        screen.clearRect(0, 0, canvas.width, canvas.height);
        screen.drawImage(background, 0, 0);
        platforms.length = 0;
        spikes.length = 0;
        blox.length = 0;
        for (let i = -1; i < queue.length - 1; i++) {
            for (let j = 0; j < 2; j++) {
                for (let k = 0; k < 12; k++) {
                    if (seg[queue[i + 1]][k][j] == 1) {
                        create_tile(grassBlock, i, j, k);
                        platforms.push([(((i * 2) + j) * 40) + x, k * 40, (((i * 2) + j) * 40) + 40 + x, (k * 40) + 40]);
                    } else if (seg[queue[i + 1]][k][j] == 2) {
                        create_tile(spikeBlock, i, j, k);
                        spikes.push([(((i * 2) + j) * 40) + x, k * 40, (((i * 2) + j) * 40) + 40 + x, (k * 40) + 40]);
                    } else if (seg[queue[i + 1]][k][j] == 3) {
                      activer = true;
                      if (block_active) {
                        create_tile(bricks, i, j, k);
                        if (!bomb_acquired && spawn_bomb) {
                          create_tile(bomb, i, j, (k - 1))
                          bomb_loc = [(((i * 2) + j) * 40) + x, (k - 1) * 40, (((i * 2) + j) * 40) + 40 + x, ((k - 1) * 40) + 40];
                        }
                      } else {
                        create_tile(block, i, j, k);
                      }
                      platforms.push([(((i * 2) + j) * 40) + x, k * 40, (((i * 2) + j) * 40) + 40 + x, (k * 40) + 40]);
                      blox = [(((i * 2) + j) * 40) + x, k * 40, (((i * 2) + j) * 40) + 40 + x, (k * 40) + 40];
                    } else if (seg[queue[i + 1]][k][j] == 4) {
                        create_tile(explosions[explosion_phase], i, j, k);
                    }
                }
            }
        }
        show_score();
        if (!activer) {
          block_active = false;
        }
        if (bomb_acquired) {
          screen.drawImage(bomb, 680, 0);
        }
      }
      function create_tile(type, i, j, k) {
        screen.drawImage(type, (((i * 2) + j) * 40) + x, k * 40);
      }
      function adjust_queue_right() {
        let r = get_rand_seg();
        if (queue.includes(r)) {
          adjust_queue_right();
        } else {
          prev_locs.push(queue.shift());
          queue.push(r);
          score += 1;
          if (r == 29) {
            spawn_bomb = true;
          }
        }
        x = 0;
      }
      function adjust_queue_left() {
        if (prev_locs.length > 0) {
            queue.unshift(prev_locs.pop());
        }
        x = 0;
      }
      function cool_function() {
        if (!spike_col()) {
            move();
            gravity();
            blox_col();
        }
      }
      function generate_random_lizard() {
        if (!lizardspawned) {
          throwlightning = false;
          let liz_num = Math.floor(Math.random() * 50000);
          setTimeout(() => {draw_lizard(); }, liz_num);
        }
      }
      function leftcycle() {
        cycleIP = true;
        leftindex += 1;
        if (leftindex > 3) {
            leftindex = 0;
        }
        if (leftPressed) {
            setTimeout(() => {leftcycle(); }, 300);
        } else {
            cycleIP = false;
            lastpressed = "Left";
            leftindex = 0;
        }
      }
      function rightcycle() {
        cycleIP = true;
        rightindex += 1;
        if (rightindex > 3) {
            rightindex = 0;
        }
        if (rightPressed) {
            setTimeout(() => {rightcycle(); }, 300);
        } else {
            cycleIP = false;
            lastPressed = "Right";
            rightindex = 0;
        }
      }
      function create_queue() {
        if (queue.length < 11) {
            let r = get_rand_seg();
            if (!queue.includes(r) && r != 8) {
                if (r == 29) {
                    spawn_bomb = true;
                }
                queue.push(r);
            }
            create_queue();
        }
      }
      function music() {
        bgmusic.play();
      }
      function swishahouseremix() {
        bgmusic.pause();
        swishswishswishahouseremix.play();
      }
      function start() {
        lightningy = y - 10;
        lightningx = 600 - 38;
        lizardindex = 0;
        throwlightning = false;
        lizardspawned = false;
        generate_random_lizard();
        game_started = true;
        music();
        platforms.length = 0;
        spikes.length = 0;
        blox.length = 0;
        queue.length = 0;
        y = 240;
        x = 0;
        block_active = false;
        score = 0;
        bomb_acquired = false;
        create_queue();
        queue[5] = 8
        letsgetgoin();
      }
      function letsgetgoin() {
        if (game_started) {
            cool_function();
            setTimeout(() => {letsgetgoin(); }, 6);
        }
      }
      document.addEventListener("keydown", keyDownHandler, false);
      document.addEventListener("keyup", keyUpHandler, false);
      function keyDownHandler(e) {
        if (e.key == "Right" || e.key == "ArrowRight" || e.key == "d") {
          rightPressed = true;
          if (!cycleIP) {
            rightcycle();
          }
        } else if (e.key == "Left" || e.key == "ArrowLeft" || e.key == "a") {
          leftPressed = true;
          if (!cycleIP) {
            leftcycle();
          }
        } else if (e.key == "Space" && dy == 0|| e.key == " " && dy == 0 || e.key == 32 && dy == 0) {
          total_jump = 0;
          spacePressed = true;
        } else if (e.key == "b") {
          if (bomb_acquired && !expIP) {
            place_bomb();
          }
        } else if (e.key == "Enter") {
            if (!game_started) {
                start();
            }
        } else if (e.key == "s") {
            if (game_started) {
                swishahouseremix();
            }
        }
      }
      function keyUpHandler(e) {
        if (e.key == "Right" || e.key == "ArrowRight" || e.key == "d") {
          rightPressed = false;
        } else if (e.key == "Left" || e.key == "ArrowLeft" || e.key == "a") {
          leftPressed = false;
        } else if (e.key == "Space" || e.key == " " || e.key == 32) {
          spacePressed = false;
        }
      }
    </script>
  </body>
</html>
