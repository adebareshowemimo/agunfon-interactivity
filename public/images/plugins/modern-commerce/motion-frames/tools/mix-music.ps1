<#
  mix-music.ps1 — mix a background music bed UNDER the voiceover with side-chain ducking.
  The music automatically dips ~13 dB whenever Brian speaks, then swells back in the gaps.
  Requires ffmpeg + ffprobe on PATH (installed: Gyan.FFmpeg).

  Usage:
      ./mix-music.ps1 -Music ".\music\corporate-build.mp3"
      ./mix-music.ps1 -Music ".\bed.wav" -MusicDb -16 -Out ".\voiceover_music.mp3"

  -MusicDb : how loud the bed sits under the voice (default -13 dB; more negative = quieter).
#>
param(
  [Parameter(Mandatory=$true)][string]$Music,
  [string]$Voiceover = (Join-Path $PSScriptRoot "..\voiceover.mp3"),
  [string]$Out       = (Join-Path $PSScriptRoot "..\voiceover_music.mp3"),
  [double]$MusicDb   = -13,
  [double]$FadeOut   = 2.5
)

if (-not (Test-Path $Voiceover)) { throw "Voiceover not found: $Voiceover (run generate-voiceover.ps1 first)." }
if (-not (Test-Path $Music))     { throw "Music file not found: $Music" }

# voiceover duration → so the music loops to cover it and fades out at the end
$dur = [double](& ffprobe -v error -show_entries format=duration -of default=nokey=1:noprint_wrappers=1 $Voiceover)
$fadeStart = [math]::Max(0, $dur - $FadeOut)
Write-Host ("Voiceover: {0:N1}s  ·  music bed at {1} dB  ·  fade-out from {2:N1}s" -f $dur, $MusicDb, $fadeStart)

$filter = @"
[0:a]aformat=sample_rates=44100:channel_layouts=stereo,asplit=2[vo1][vokey];
[1:a]aformat=sample_rates=44100:channel_layouts=stereo,volume=${MusicDb}dB[bg];
[bg][vokey]sidechaincompress=threshold=0.05:ratio=8:attack=5:release=300[duck];
[vo1][duck]amix=inputs=2:duration=first:normalize=0[mx];
[mx]afade=t=in:st=0:d=0.8,afade=t=out:st=${fadeStart}:d=${FadeOut},loudnorm=I=-16:TP=-1.5:LRA=11[out]
"@ -replace "`r?`n",""

& ffmpeg -y -i $Voiceover -stream_loop -1 -i $Music `
  -filter_complex $filter -map "[out]" -c:a libmp3lame -b:a 192k $Out

if (Test-Path $Out) { Write-Host ("Done -> {0} ({1:N0} bytes)" -f (Resolve-Path $Out), (Get-Item $Out).Length) }
