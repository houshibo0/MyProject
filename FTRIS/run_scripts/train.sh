dataset_name="refcocog_g" # "refcoco", "refcoco+", "refcocog_g", "refcocog_u"
config_name="bridge_v16.yaml"
gpu="0"
export CUDA_VISIBLE_DEVICES=$gpu
np=$(echo $CUDA_VISIBLE_DEVICES | tr ',' '\n' | wc -l)
omp=1

OMP_NUM_THREADS=$omp \
MASTER_PORT=29560 \
torchrun --nproc_per_node=$np --master_port=29999 \
train.py \
--config config/$dataset_name/$config_name